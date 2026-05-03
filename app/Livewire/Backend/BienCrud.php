<?php

namespace App\Livewire\Backend;

use App\Models\Bien;
use App\Models\CategorieBien;
use App\Models\Doyenne;
use App\Models\Paroisse;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class BienCrud extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $categorieFilter = '';
    public $etatFilter = '';
    public $editMode = false;
    public $bienId;
    public $categorie_bien_id = '';
    public $designation = '';
    public $reference = '';
    public $description = '';
    public $quantite = 1;
    public $prix_unitaire = '';
    public $etat = 'bon';
    public $localisation = '';
    public $proprietaire_type = 'bureau_diocesain';
    public $doyenne_id = '';
    public $paroisse_id = '';
    public $date_acquisition = '';
    public $categorieDesignation = '';
    public $categorieDescription = '';
    public $categorieId = null;
    public $categorieEditMode = false;

    protected $rules = [
        'categorie_bien_id' => 'required|exists:categories_biens,id',
        'designation' => 'required|string|max:255',
        'reference' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'quantite' => 'required|integer|min:1',
        'prix_unitaire' => 'nullable|numeric|min:0',
        'etat' => 'required|in:neuf,bon,moyen,a_reparer,hors_service',
        'localisation' => 'nullable|string|max:255',
        'proprietaire_type' => 'required|in:bureau_diocesain,doyenne,paroisse',
        'doyenne_id' => 'nullable|exists:doyennes,id',
        'paroisse_id' => 'nullable|exists:paroisses,id',
        'date_acquisition' => 'nullable|date',
    ];

    public function updatedProprietaireType()
    {
        $this->doyenne_id = '';
        $this->paroisse_id = '';
    }

    public function render()
    {
        $query = Bien::with(['categorie', 'doyenne', 'paroisse']);

        if ($this->searchTerm) {
            $query->where(function ($subQuery) {
                $subQuery->where('designation', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('reference', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('localisation', 'like', '%'.$this->searchTerm.'%')
                    ->orWhereHas('categorie', fn ($q) => $q->where('designation', 'like', '%'.$this->searchTerm.'%'));
            });
        }

        if ($this->categorieFilter) {
            $query->where('categorie_bien_id', $this->categorieFilter);
        }

        if ($this->etatFilter) {
            $query->where('etat', $this->etatFilter);
        }

        $totalBiens = Bien::sum('quantite');
        $valeurStock = Bien::query()
            ->selectRaw('COALESCE(SUM(COALESCE(prix_unitaire, 0) * quantite), 0) as total')
            ->value('total');

        return view('livewire.backend.bien-crud', [
            'biens' => $query->latest()->paginate(10),
            'categories' => CategorieBien::withCount('biens')->orderBy('designation')->get(),
            'doyennes' => Doyenne::orderBy('designation')->get(),
            'paroisses' => Paroisse::with('doyenne')->orderBy('designation')->get(),
            'totalBiens' => $totalBiens,
            'valeurStock' => $valeurStock,
        ])->layout('layouts.defaultbackend', ['title' => 'Gestion des biens']);
    }

    public function createBien()
    {
        $this->resetForm();
        $this->dispatch('openBienModal');
    }

    public function addCategorie()
    {
        $this->validate([
            'categorieDesignation' => 'required|string|max:255|unique:categories_biens,designation'.($this->categorieId ? ','.$this->categorieId : ''),
            'categorieDescription' => 'nullable|string',
        ]);

        CategorieBien::updateOrCreate(['id' => $this->categorieId], [
            'designation' => $this->categorieDesignation,
            'description' => $this->categorieDescription,
        ]);

        $this->resetCategorieForm();
        session()->flash('message', 'Categorie enregistree avec succes.');
    }

    public function editCategorie($id)
    {
        $categorie = CategorieBien::findOrFail($id);

        $this->categorieId = $id;
        $this->categorieDesignation = $categorie->designation;
        $this->categorieDescription = $categorie->description;
        $this->categorieEditMode = true;
    }

    public function deleteCategorie($id)
    {
        $categorie = CategorieBien::withCount('biens')->findOrFail($id);

        if ($categorie->biens_count > 0) {
            session()->flash('message', 'Impossible de supprimer une categorie qui contient deja des biens.');
            return;
        }

        $categorie->delete();
        session()->flash('message', 'Categorie supprimee avec succes.');
    }

    public function addBien()
    {
        $this->validate();
        $this->validateOwner();

        Bien::create($this->payload());

        $this->resetForm();
        $this->dispatch('bienSaved');
        session()->flash('message', 'Bien enregistre avec succes.');
    }

    public function editBien($id)
    {
        $bien = Bien::findOrFail($id);

        $this->bienId = $id;
        $this->categorie_bien_id = $bien->categorie_bien_id;
        $this->designation = $bien->designation;
        $this->reference = $bien->reference;
        $this->description = $bien->description;
        $this->quantite = $bien->quantite;
        $this->prix_unitaire = $bien->prix_unitaire;
        $this->etat = $bien->etat;
        $this->localisation = $bien->localisation;
        $this->proprietaire_type = $bien->proprietaire_type;
        $this->doyenne_id = $bien->doyenne_id;
        $this->paroisse_id = $bien->paroisse_id;
        $this->date_acquisition = optional($bien->date_acquisition)->format('Y-m-d');
        $this->editMode = true;
        $this->dispatch('openBienModal');
    }

    public function updateBien()
    {
        $this->validate();
        $this->validateOwner();

        Bien::findOrFail($this->bienId)->update($this->payload());

        $this->resetForm();
        $this->dispatch('bienSaved');
        session()->flash('message', 'Bien modifie avec succes.');
    }

    public function deleteBien($id)
    {
        LivewireAlert::title('Suppression bien')
            ->text('Voulez-vous supprimer ce bien du stock ?')
            ->asConfirm()
            ->onConfirm('deleteItem', ['id' => $id])
            ->show();
    }

    public function deleteItem($data)
    {
        Bien::find($data['id'])?->delete();
        LivewireAlert::title('Succes')->text('Bien supprime avec succes')->success()->timer(5000)->show();
    }

    private function payload(): array
    {
        return [
            'categorie_bien_id' => $this->categorie_bien_id,
            'designation' => $this->designation,
            'reference' => $this->reference,
            'description' => $this->description,
            'quantite' => $this->quantite,
            'prix_unitaire' => $this->prix_unitaire ?: null,
            'etat' => $this->etat,
            'localisation' => $this->localisation,
            'proprietaire_type' => $this->proprietaire_type,
            'doyenne_id' => $this->proprietaire_type === 'doyenne' ? $this->doyenne_id : null,
            'paroisse_id' => $this->proprietaire_type === 'paroisse' ? $this->paroisse_id : null,
            'date_acquisition' => $this->date_acquisition ?: null,
            'valeur_estimee' => $this->prix_unitaire ?: null,
        ];
    }

    private function validateOwner(): void
    {
        if ($this->proprietaire_type === 'doyenne') {
            $this->validate(['doyenne_id' => 'required|exists:doyennes,id']);
        }

        if ($this->proprietaire_type === 'paroisse') {
            $this->validate(['paroisse_id' => 'required|exists:paroisses,id']);
        }
    }

    private function resetForm(): void
    {
        $this->reset([
            'bienId',
            'categorie_bien_id',
            'designation',
            'reference',
            'description',
            'localisation',
            'doyenne_id',
            'paroisse_id',
            'date_acquisition',
            'prix_unitaire',
            'editMode',
        ]);
        $this->quantite = 1;
        $this->etat = 'bon';
        $this->proprietaire_type = 'bureau_diocesain';
        $this->resetErrorBag();
    }

    private function resetCategorieForm(): void
    {
        $this->reset(['categorieId', 'categorieDesignation', 'categorieDescription', 'categorieEditMode']);
    }
}

<?php

namespace App\Livewire\Backend;

use App\Models\MouvementFinancier;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class MouvementFinancierCrud extends Component
{
    use WithPagination, WithFileUploads;

    public $searchTerm = '';
    public $typeFilter = '';
    public $dateDebut = '';
    public $dateFin = '';
    public $editMode = false;
    public $mouvementId;
    public $type = 'revenu';
    public $designation = '';
    public $motif = '';
    public $montant = '';
    public $date_operation = '';
    public $mode_paiement = 'espece';
    public $reference = '';
    public $piece_jointe = null;

    protected $rules = [
        'type' => 'required|in:revenu,depense',
        'designation' => 'required|string|max:255',
        'motif' => 'nullable|string',
        'montant' => 'required|numeric|min:0.01',
        'date_operation' => 'required|date',
        'mode_paiement' => 'required|in:espece,mobile_money,banque,autre',
        'reference' => 'nullable|string|max:255',
        'piece_jointe' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
    ];

    public function render()
    {
        $baseQuery = MouvementFinancier::query();
        $query = MouvementFinancier::with('creator');

        foreach ([$baseQuery, $query] as $currentQuery) {
            if ($this->typeFilter) {
                $currentQuery->where('type', $this->typeFilter);
            }

            if ($this->dateDebut) {
                $currentQuery->whereDate('date_operation', '>=', $this->dateDebut);
            }

            if ($this->dateFin) {
                $currentQuery->whereDate('date_operation', '<=', $this->dateFin);
            }
        }

        if ($this->searchTerm) {
            $query->where(function ($subQuery) {
                $subQuery->where('designation', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('motif', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('reference', 'like', '%'.$this->searchTerm.'%');
            });
        }

        $totalRevenus = (clone $baseQuery)->where('type', 'revenu')->sum('montant');
        $totalDepenses = (clone $baseQuery)->where('type', 'depense')->sum('montant');

        return view('livewire.backend.mouvement-financier-crud', [
            'mouvements' => $query->latest('date_operation')->paginate(10),
            'totalRevenus' => $totalRevenus,
            'totalDepenses' => $totalDepenses,
            'solde' => $totalRevenus - $totalDepenses,
        ])->layout('layouts.defaultbackend', ['title' => 'Gestion de la caisse']);
    }

    public function createMouvement()
    {
        $this->resetForm();
        $this->date_operation = now()->format('Y-m-d');
        $this->dispatch('openFinanceModal');
    }

    public function addMouvement()
    {
        $this->validate();

        MouvementFinancier::create($this->payload() + [
            'piece_jointe' => $this->piece_jointe ? $this->storePieceJointe() : null,
            'created_by' => auth()->id(),
        ]);

        $this->resetForm();
        $this->dispatch('financeSaved');
        session()->flash('message', 'Mouvement financier enregistre avec succes.');
    }

    public function editMouvement($id)
    {
        $mouvement = MouvementFinancier::findOrFail($id);

        $this->mouvementId = $id;
        $this->type = $mouvement->type;
        $this->designation = $mouvement->designation;
        $this->motif = $mouvement->motif;
        $this->montant = $mouvement->montant;
        $this->date_operation = optional($mouvement->date_operation)->format('Y-m-d');
        $this->mode_paiement = $mouvement->mode_paiement;
        $this->reference = $mouvement->reference;
        $this->editMode = true;
        $this->dispatch('openFinanceModal');
    }

    public function updateMouvement()
    {
        $this->validate();

        $mouvement = MouvementFinancier::findOrFail($this->mouvementId);
        $data = $this->payload();

        if ($this->piece_jointe) {
            if ($mouvement->piece_jointe && Storage::disk('public')->exists($mouvement->piece_jointe)) {
                Storage::disk('public')->delete($mouvement->piece_jointe);
            }

            $data['piece_jointe'] = $this->storePieceJointe();
        }

        $mouvement->update($data);

        $this->resetForm();
        $this->dispatch('financeSaved');
        session()->flash('message', 'Mouvement financier modifie avec succes.');
    }

    public function deleteMouvement($id)
    {
        LivewireAlert::title('Suppression mouvement')
            ->text('Voulez-vous supprimer cette operation de caisse ?')
            ->asConfirm()
            ->onConfirm('deleteItem', ['id' => $id])
            ->show();
    }

    public function deleteItem($data)
    {
        $mouvement = MouvementFinancier::find($data['id']);

        if (! $mouvement) {
            return;
        }

        if ($mouvement->piece_jointe && Storage::disk('public')->exists($mouvement->piece_jointe)) {
            Storage::disk('public')->delete($mouvement->piece_jointe);
        }

        $mouvement->delete();
        LivewireAlert::title('Succes')->text('Operation supprimee avec succes')->success()->timer(5000)->show();
    }

    private function payload(): array
    {
        return [
            'type' => $this->type,
            'designation' => $this->designation,
            'motif' => $this->motif,
            'montant' => $this->montant,
            'date_operation' => $this->date_operation,
            'mode_paiement' => $this->mode_paiement,
            'reference' => $this->reference,
        ];
    }

    private function storePieceJointe(): string
    {
        $fileName = time().'_'.$this->piece_jointe->getClientOriginalName();

        return $this->piece_jointe->storeAs('pieces-caisse', $fileName, 'public');
    }

    private function resetForm(): void
    {
        $this->reset([
            'mouvementId',
            'designation',
            'motif',
            'montant',
            'date_operation',
            'reference',
            'piece_jointe',
            'editMode',
        ]);
        $this->type = 'revenu';
        $this->mode_paiement = 'espece';
        $this->resetErrorBag();
    }
}

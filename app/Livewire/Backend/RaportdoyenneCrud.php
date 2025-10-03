<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Rapportdoyenne;
use App\Models\Doyenne;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class RaportdoyenneCrud extends Component
{
    use WithPagination, WithFileUploads;

    public $searchTerm = '';
    public $editMode = false;
    public $raportId;

    // Champs du formulaire
    public $designation = '';
    public $annee = '';
    public $lienfichier = null;
    public $envoyer_par = '';
    public $doyenne_id = '';
    public $dateenvoi = '';

    protected $rules = [
        'designation' => 'required|string|max:255',
        'annee' => 'required|string|max:4',
        'lienfichier' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'envoyer_par' => 'required|string|max:255',
        'doyenne_id' => 'required|exists:doyennes,id',
        'dateenvoi' => 'required|date',
    ];
    

    public function render()
    {
        $query = Rapportdoyenne::with('doyenne');

        if ($this->searchTerm) {
            $query->where(function($q) {
                $q->where('designation', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('annee', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('envoyer_par', 'like', '%'.$this->searchTerm.'%')
                  ->orWhereHas('doyenne', function($q2) {
                      $q2->where('designation', 'like', '%'.$this->searchTerm.'%');
                  });
            });
        }

        $raports = $query->orderBy('id', 'desc')->paginate(10);
        $doyennes = Doyenne::all();

        return view('livewire.backend.raportdoyenne-crud', [
            'raports' => $raports,
            'doyennes' => $doyennes
        ])->layout('layouts.defaultbackend', ['title' => 'Rapport Doyenne']);
    }

    public function addRaport()
    {
        $this->validate();

        $data = [
            'designation' => $this->designation,
            'annee' => $this->annee,
            'envoyer_par' => $this->envoyer_par,
            'doyenne_id' => $this->doyenne_id,
            'dateenvoi' => $this->dateenvoi,
        ];

        // Gestion du fichier uploadé
        if ($this->lienfichier) {
            $fileName = time() . '_' . $this->lienfichier->getClientOriginalName();
            $filePath = $this->lienfichier->storeAs('rapports/doyennes', $fileName, 'public');
            $data['lienfichier'] = $filePath;
        }

        Rapportdoyenne::create($data);

        $this->resetForm();
        $this->dispatch('raportAdded');
        session()->flash('message', 'Rapport ajouté avec succès.');
    }

    public function editRaport($id)
    {
        $raport = Rapportdoyenne::findOrFail($id);

        $this->raportId = $id;
        $this->designation = $raport->designation;
        $this->annee = $raport->annee;
        $this->envoyer_par = $raport->envoyer_par;
        $this->doyenne_id = $raport->doyenne_id;
        $this->dateenvoi = $raport->dateenvoi;

        $this->editMode = true;
        $this->dispatch('openModal');
    }

    public function updateRaport()
    {
        $this->validate();

        $raport = Rapportdoyenne::findOrFail($this->raportId);

        $data = [
            'designation' => $this->designation,
            'annee' => $this->annee,
            'envoyer_par' => $this->envoyer_par,
            'doyenne_id' => $this->doyenne_id,
            'dateenvoi' => $this->dateenvoi,
        ];

        // Gestion du fichier uploadé
        if ($this->lienfichier) {
            // Supprimer l'ancien fichier
            if ($raport->lienfichier && Storage::disk('public')->exists($raport->lienfichier)) {
                Storage::disk('public')->delete($raport->lienfichier);
            }

            $fileName = time() . '_' . $this->lienfichier->getClientOriginalName();
            $filePath = $this->lienfichier->storeAs('rapports/doyennes', $fileName, 'public');
            $data['lienfichier'] = $filePath;
        }

        $raport->update($data);

        $this->resetForm();
        $this->dispatch('raportUpdated');
        session()->flash('message', 'Rapport modifié avec succès.');
    }


      public function deleteRaport($id){
 LivewireAlert::title('Supression Doyenne')
    ->text('Êtes-vous sûr de vouloir supprimer cet élément ?')
    ->asConfirm()
    ->onConfirm('deleteItem', ['id' => $id])
    // ->onDeny('keepItem', ['id' => $this->itemId])
    ->show();
    }

public function deleteItem($data)
{
    $itemId = $data['id'];
     $raport = Rapportdoyenne::find($itemId);
        
        if ($raport) {
            // Supprimer le fichier associé
            if ($raport->lienfichier && Storage::disk('public')->exists($raport->lienfichier)) {
                Storage::disk('public')->delete($raport->lienfichier);
            }
            
            $raport->delete();
             LivewireAlert::title('Success')
    ->text('Rapport supprimé avec succès')
    ->success()
    ->timer(5000) // Dismisses after 5 seconds
    ->show();
            session()->flash('message', 'Rapport supprimé avec succès.');
        }
}

    public function downloadFile($id)
    {
        $raport = Rapportdoyenne::findOrFail($id);
        
        if ($raport->lienfichier && Storage::disk('public')->exists($raport->lienfichier)) {
            return Storage::disk('public')->download($raport->lienfichier);
        }
        
        session()->flash('error', 'Fichier non trouvé.');
        return redirect()->back();
    }

    private function resetForm()
    {
        $this->reset([
            'raportId', 'designation', 'annee', 'lienfichier', 
            'envoyer_par', 'doyenne_id', 'dateenvoi', 'editMode'
        ]);
        $this->resetErrorBag();
    }
}
<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Doyenne;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class DoyenneCrud extends Component
{
     use WithPagination;

    public $searchTerm = '';
    public $editMode = false;
    public $doyenneId;

    // Champs du formulaire
    public $designation = '';
    public $localisation = '';
    public $responsable = '';
    public $nombreaproximatifmembre = '';
    public $fonction = '';
    public $contact = '';

    protected $rules = [
        'designation' => 'required|string|max:255',
        'localisation' => 'required|string|max:255',
        'responsable' => 'required|string|max:255',
        'nombreaproximatifmembre' => 'required|integer|min:1',
        'fonction' => 'required|string|max:255',
        'contact' => 'required|string|max:255',
    ];
    public function render()
    {
        $query = Doyenne::query();

        if ($this->searchTerm) {
            $query->where(function($q) {
                $q->where('designation', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('localisation', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('responsable', 'like', '%'.$this->searchTerm.'%');
            });
        }

        $doyennes = $query->orderBy('id', 'desc')->paginate(10);

        return view('livewire.backend.doyenne-crud', 
        ['doyennes' => $doyennes]
        )->layout('layouts.defaultbackend',['title' => 'Doyenne']);
    }
    public function addDoyenne()
    {
        $this->validate();

        Doyenne::create([
            'designation' => $this->designation,
            'localisation' => $this->localisation,
            'responsable' => $this->responsable,
            'nombreaproximatifmembre' => $this->nombreaproximatifmembre,
            'fonction' => $this->fonction,
            'contact' => $this->contact,
            'status' => 'active'
        ]);

        $this->resetForm();
        $this->dispatch('doyenneAdded');
        session()->flash('message', 'Doyenne ajoutée avec succès.');
    }

    public function editDoyenne($id)
    {
        $doyenne = Doyenne::findOrFail($id);

        $this->doyenneId = $id;
        $this->designation = $doyenne->designation;
        $this->localisation = $doyenne->localisation;
        $this->responsable = $doyenne->responsable;
        $this->nombreaproximatifmembre = $doyenne->nombreaproximatifmembre;
        $this->fonction = $doyenne->fonction;
        $this->contact = $doyenne->contact;

        $this->editMode = true;
        $this->dispatch('openModal');
    }

    public function updateDoyenne()
    {
        $this->validate();

        $doyenne = Doyenne::findOrFail($this->doyenneId);
        $doyenne->update([
            'designation' => $this->designation,
            'localisation' => $this->localisation,
            'responsable' => $this->responsable,
            'nombreaproximatifmembre' => $this->nombreaproximatifmembre,
            'fonction' => $this->fonction,
            'contact' => $this->contact,
        ]);

        $this->resetForm();
        $this->dispatch('doyenneUpdated');
        session()->flash('message', 'Doyenne modifiée avec succès.');
    }



    private function resetForm()
    {
        $this->reset([
            'doyenneId', 'designation', 'localisation', 'responsable',
            'nombreaproximatifmembre', 'fonction', 'contact', 'editMode'
        ]);
    }
    public function deleteDoyenne($id){
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
     Doyenne::find($itemId)->delete();
     LivewireAlert::title('Success')
    ->text('Doyenné Suprimé avec success')
    ->success()
    ->timer(5000) // Dismisses after 5 seconds
    ->show();
}

}

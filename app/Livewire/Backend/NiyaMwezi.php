<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Niamwezi as Niamwezimodel;

class Niyamwezi extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $designation, $mois;
    public $editMode = false;
    public $niamweziId;
    public $confirmingDelete = false;
    public $itemIdToDelete;
    public $successMessage = '';
    
    public $rules = [
        'designation' => 'required',
        'mois' => 'required',
    ];
    
    protected $messages = [
        'designation.required' => 'Le champ désignation est obligatoire.',
        'mois.required' => 'Le champ mois est obligatoire.',
    ];
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function addNiamwezi()
    {
        $this->validate();
        $nia = Niamwezimodel::create([
            'designation' => $this->designation,
            'mois' => $this->mois
        ]);
        
        if($nia){
            $this->successMessage = 'Enregistrement effectué avec succès';
            $this->resetInputFields();
            $this->dispatch('niamweziAdded');
        }
    }

    public function editNia($id)
    {
        $this->niamweziId = $id;
        $nia = Niamwezimodel::find($id);
        
        if($nia) {
            $this->designation = $nia->designation;
            $this->mois = $nia->mois;
            $this->editMode = true;
            $this->dispatch('openNiamweziModal');
        }
    }

    public function updateNiamwezi()
    {
        $this->validate();
        
        $nia = Niamwezimodel::find($this->niamweziId);
        if($nia) {
            $nia->update([
                'designation' => $this->designation,
                'mois' => $this->mois
            ]);
            
            $this->successMessage = 'Modification effectuée avec succès';
            $this->resetInputFields();
            $this->dispatch('niamweziUpdated');
        }
    }
    
    public function resetInputFields()
    {
        $this->designation = '';
        $this->mois = '';
        $this->editMode = false;
        $this->niamweziId = null;
        $this->successMessage = '';
    }

    public function changeStatus($id)
    {
        $nia = Niamwezimodel::find($id);
        if($nia) {
            $nia->statuts = $nia->statuts == 'actif' ? 'inactif' : 'actif';
            $nia->save();
            
            $this->successMessage = 'Statut modifié avec succès';
        }
    }

    public function deleteNia($id)
    {
        $this->itemIdToDelete = $id;
        $this->confirmingDelete = true;
    }

    public function confirmDelete()
    {
        if($this->itemIdToDelete) {
            Niamwezimodel::find($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;
            $this->itemIdToDelete = null;
            $this->successMessage = 'Élément supprimé avec succès';
        }
    }

    public function cancelDelete()
    {
        $this->confirmingDelete = false;
        $this->itemIdToDelete = null;
    }

    public function render()
    {
        $query = Niamwezimodel::query();

        if ($this->searchTerm) {
            $query->where(function($q) {
                $q->where('designation', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('mois', 'like', '%'.$this->searchTerm.'%');
            });
        }

        $niamwezis = $query->paginate(10);
        
        return view('livewire.backend.niya-mwezi', [
            'niamwezis' => $niamwezis
        ])->layout('layouts.defaultbackend', ['title' => 'Niamwezi']);
    }
}
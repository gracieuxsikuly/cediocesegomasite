<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Countmember as CountmemberModel;

class Countmembers extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $count_croisillons, $count_feunouveau, $count_cadets, $count_equap, $annee;
    public $editMode = false;
    public $countmemberId;
    public $confirmingDelete = false;
    public $itemIdToDelete;
    public $successMessage = '';

    protected $rules = [
        'count_croisillons' => 'required|integer|min:0',
        'count_feunouveau' => 'required|integer|min:0',
        'count_cadets' => 'required|integer|min:0',
        'count_equap' => 'required|integer|min:0',
        'annee' => 'required|integer|min:1900|max:2100',
    ];

    protected $messages = [
        'count_croisillons.required' => 'Le champ Croisillons est obligatoire.',
        'count_feunouveau.required' => 'Le champ Feu Nouveau est obligatoire.',
        'count_cadets.required' => 'Le champ Cadets est obligatoire.',
        'count_equap.required' => 'Le champ Equap est obligatoire.',
        'annee.required' => 'Le champ Année est obligatoire.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addCountmember()
    {
        $this->validate();

        $count = CountmemberModel::create([
            'count_croisillons' => $this->count_croisillons,
            'count_feunouveau' => $this->count_feunouveau,
            'count_cadets' => $this->count_cadets,
            'count_equap' => $this->count_equap,
            'annee' => (int) $this->annee,
        ]);

        if($count){
            $this->successMessage = 'Enregistrement effectué avec succès';
            $this->resetInputFields();
            $this->dispatch('countmemberAdded');
        }
    }

    public function editCount($id)
    {
        $this->countmemberId = $id;
        $count = CountmemberModel::find($id);

        if($count){
            $this->count_croisillons = $count->count_croisillons;
            $this->count_feunouveau = $count->count_feunouveau;
            $this->count_cadets = $count->count_cadets;
            $this->count_equap = $count->count_equap;
            $this->annee = $count->annee;
            $this->editMode = true;
            $this->dispatch('openCountmemberModal');
        }
    }

    public function updateCountmember()
    {
        $this->validate();

        $count = CountmemberModel::find($this->countmemberId);
        if($count){
            $count->update([
                'count_croisillons' => $this->count_croisillons,
                'count_feunouveau' => $this->count_feunouveau,
                'count_cadets' => $this->count_cadets,
                'count_equap' => $this->count_equap,
                'annee' => $this->annee,
            ]);

            $this->successMessage = 'Modification effectuée avec succès';
            $this->resetInputFields();
            $this->dispatch('countmemberUpdated');
        }
    }

    public function resetInputFields()
    {
        $this->count_croisillons = '';
        $this->count_feunouveau = '';
        $this->count_cadets = '';
        $this->count_equap = '';
        $this->annee = '';
        $this->editMode = false;
        $this->countmemberId = null;
        $this->successMessage = '';
    }

    public function deleteCount($id)
    {
        $this->itemIdToDelete = $id;
        $this->confirmingDelete = true;
    }

    public function confirmDelete()
    {
        if($this->itemIdToDelete){
            CountmemberModel::find($this->itemIdToDelete)->delete();
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
        $query = CountmemberModel::query();

        if($this->searchTerm){
            $query->where(function($q){
                $q->where('count_croisillons', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('count_feunouveau', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('count_cadets', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('count_equap', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('annee', 'like', '%'.$this->searchTerm.'%');
            });
        }

        $countmembers = $query->orderBy('id', 'desc')->paginate(10);

        return view('livewire.backend.countmembers', [
            'countmembers' => $countmembers
        ])->layout('layouts.defaultbackend', ['title' => 'Count Members']);
    }
}

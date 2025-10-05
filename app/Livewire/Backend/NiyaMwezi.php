<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Niamwezi as Niamwezimodel;

class NiyaMwezi extends Component
{
    public $searchTerm = '';
    public $designation,$mois;
     public $editMode = false;
      public $niamweziId;
     public $rules = [
        'designation' => 'required',
        'mois' => 'required',
     ];
    //  message validation
        protected $messages = [
            'designation.required' => 'Le champ désignation est obligatoire.',
            'mois.required' => 'Le champ mois est obligatoire.',
        ];
    // validation des champs en temps réel
     public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function addNiamwezi(){
        $this->validate();
        $nia=Niamwezimodel::create([
            'designation' => $this->designation,
            'mois'=>$this->mois
        ]);
        if($nia){
            session()->flash('message','Enregistrement effectué avec succès');
            $this->resetInputFields();
           // $this->dispatch('niamweziUpdated');
        }
    }
        public function resetInputFields(){
            $this->designation = '';
            $this->mois = '';
        }

    // edtit
    
    // delete
      
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
        return view('livewire.backend.niya-mwezi',[
             'niamwezis'=>$niamwezis
        ])->layout('layouts.defaultbackend',['title' => 'Niamwezi']);
    }
}

<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Paroisse;
use App\Models\Doyenne;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class ParoisseCrud extends Component
{
     use WithPagination;

   public $searchTerm = '';
    public $designation, $localisation, $longitude, $latitude, $responsable, $fonction, 
    $contact, $nombreaproximatifmembre, $doyenne_id;
    public $editMode = false;
    public $paroisseId;


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
        $doyennes = Doyenne::all();
        $query = Paroisse::query();

        if ($this->searchTerm) {
            $query->where(function($q) {
                $q->where('designation', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('localisation', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('responsable', 'like', '%'.$this->searchTerm.'%');
            });
        }

        $paroisses = $query->orderBy('id', 'desc')->paginate(10);

        return view('livewire.backend.paroisse-crud', 
        ['paroisses' => $paroisses,
        'doyennes' => $doyennes
        ]
        )->layout('layouts.defaultbackend',['title' => 'Paroisse']);
    }
    public function addParoisse()
    {
        $this->validate();

        Paroisse::create([
            'designation' => $this->designation,
            'localisation' => $this->localisation,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'responsable' => $this->responsable,
            'nombreaproximatifmembre' => $this->nombreaproximatifmembre,
            'fonction' => $this->fonction,
            'contact' => $this->contact,
            'doyenne_id' => $this->doyenne_id,
        ]);

        $this->resetForm();
        // $this->dispatch('paroisseAdded');
        session()->flash('message', 'Paroisse ajoutée avec succès.');
    }

    public function editParoisse($id)
    {
        $paroisse = Paroisse::findOrFail($id);

        $this->paroisseId = $id;
        $this->designation = $paroisse->designation;
        $this->localisation = $paroisse->localisation;
        $this->longitude = $paroisse->longitude;
        $this->latitude = $paroisse->latitude;
        $this->responsable = $paroisse->responsable;
        $this->nombreaproximatifmembre = $paroisse->nombreaproximatifmembre;
        $this->fonction = $paroisse->fonction;
        $this->contact = $paroisse->contact;
        $this->doyenne_id = $paroisse->doyenne_id;

        $this->editMode = true;
        $this->dispatch('openModal');
    }

    public function updateParoisse()
    {
        $this->validate();

        $paroisse = Paroisse::findOrFail($this->paroisseId);
        $paroisse->update([
            'designation' => $this->designation,
            'localisation' => $this->localisation,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'responsable' => $this->responsable,
            'nombreaproximatifmembre' => $this->nombreaproximatifmembre,
            'fonction' => $this->fonction,
            'contact' => $this->contact,
            'doyenne_id' => $this->doyenne_id,
        ]);

        $this->resetForm();
        $this->dispatch('paroisseUpdated');
        session()->flash('message', 'Paroisse modifiée avec succès.');
    }



    private function resetForm()
    {
        $this->reset([
            'paroisseId', 'designation', 'localisation',
            'longitude', 'latitude', 'nombreaproximatifmembre',
            'fonction', 'contact', 'editMode'
        ]);
    }
    public function deleteParoisse($id){
 LivewireAlert::title('Supression Paroisse')
    ->text('Êtes-vous sûr de vouloir supprimer cet élément ?')
    ->asConfirm()
    ->onConfirm('deleteItem', ['id' => $id])
    // ->onDeny('keepItem', ['id' => $this->itemId])
    ->show();
    }

public function deleteItem($data)
{
    $itemId = $data['id'];
     Paroisse::find($itemId)->delete();
     LivewireAlert::title('Success')
    ->text('Paroisse Suprimé avec success')
    ->success()
    ->timer(5000) // Dismisses after 5 seconds
    ->show();
}

}

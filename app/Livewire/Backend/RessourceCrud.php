<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ressource;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Illuminate\Support\Facades\Storage;

class RessourceCrud extends Component
{
     use WithPagination, WithFileUploads;

    public $searchTerm = '';
    public $editMode = false;
    public $ressourceId;
     public $lienfichier = null;

    // Champs du formulaire
    public $titre = '';
    public $description = '';
    public $typeressource = '';

    protected $rules = [
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'typeressource' => 'required|string|max:255',
         'lienfichier' => 'nullable|file|mimes:pdf,mp3,mp4|max:10240',
    ];

    // Options pour le type de ressource
    public $typeOptions = ['Theme'=>'Theme',
    'Hymne et chant'=>'Hymne et chant',
    'Collection theme'=>'Collection theme',
    'Collection livre'=>'Collection livre',
    'Radio maria'=>'Radio maria',
    'Autre'=>'Autre'];

    public function render()
    {
        $query = Ressource::query();

        if ($this->searchTerm) {
            $query->where(function($q) {
                $q->where('titre', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('description', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('typeressource', 'like', '%'.$this->searchTerm.'%');
            });
        }

        $ressources = $query->orderBy('id', 'desc')->paginate(10);

        return view('livewire.backend.ressource-crud', [
            'ressources' => $ressources,
            'typeOptions' => $this->typeOptions
        ])->layout('layouts.defaultbackend', ['title' => 'Ressources']);
    }

    public function addRessource()
    {
        $this->validate();
 // Gestion du fichier uploadé
        if ($this->lienfichier) {
            $fileName = time() . '_' . $this->lienfichier->getClientOriginalName();
            $filePath = $this->lienfichier->storeAs('ressources', $fileName, 'public');
        }
        Ressource::create([
            'titre' => $this->titre,
            'description' => $this->description,
            'typeressource' => $this->typeressource,
            'file' => $filePath ?? null,
        ]);

        $this->resetForm();
        $this->dispatch('ressourceAdded');
        session()->flash('message', 'Ressource ajoutée avec succès.');
    }

    public function editRessource($id)
    {
        $ressource = Ressource::findOrFail($id);

        $this->ressourceId = $id;
        $this->titre = $ressource->titre;
        $this->description = $ressource->description;
        $this->typeressource = $ressource->typeressource;
        $this->editMode = true;
        $this->dispatch('openModal');
    }

    public function updateRessource()
    {
        $this->validate();

        $ressource = Ressource::findOrFail($this->ressourceId);
        $ressource->update([
            'titre' => $this->titre,
            'description' => $this->description,
            'typeressource' => $this->typeressource,
        ]);
        // Gestion du fichier uploadé
        if ($this->lienfichier) {
            // Supprimer l'ancien fichier
            if ($ressource->file && Storage::disk('public')->exists($ressource->file)) {
                Storage::disk('public')->delete($ressource->file);
            }
            $fileName = time() . '_' . $this->lienfichier->getClientOriginalName();
            $filePath = $this->lienfichier->storeAs('ressources', $fileName, 'public');
            $data['file'] = $filePath;
            $ressource->update($data);
        }

        $this->resetForm();
        $this->dispatch('ressourceUpdated');
        session()->flash('message', 'Ressource modifiée avec succès.');
    }

public function deleteRessource($id){
 LivewireAlert::title('Supression de la Ressource')
    ->text('Êtes-vous sûr de vouloir supprimer cet élément ?')
    ->asConfirm()
    ->onConfirm('deleteItem', ['id' => $id])
    // ->onDeny('keepItem', ['id' => $this->itemId])
    ->show();
    }

public function deleteItem($data)
{
    $itemId = $data['id'];
     $ressource = Ressource::find($itemId);

        if ($ressource) {
            // Supprimer le fichier associé
            if ($ressource->lienfichier && Storage::disk('public')->exists($ressource->lienfichier)) {
                Storage::disk('public')->delete($ressource->lienfichier);
            }

            $ressource->delete();
             LivewireAlert::title('Success')
    ->text('Ressource supprimée avec succès')
    ->success()
    ->timer(5000) // Dismisses after 5 seconds
    ->show();
            session()->flash('message', 'Ressource supprimée avec succès.');
        }
}


    public $selectedRessource;
    public function showRessource($id)
    {
         $this->selectedRessource = Ressource::findOrFail($id);
        $this->dispatch('showRessourceDetail');
    }

    private function resetForm()
    {
        $this->reset([
            'ressourceId', 'titre', 'description', 'typeressource', 'editMode'
        ]);
        $this->resetErrorBag();
    }
}
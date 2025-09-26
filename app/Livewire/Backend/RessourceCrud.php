<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ressource;

class RessourceCrud extends Component
{
    use WithPagination;

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
         'lienfichier' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
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
            $filePath = $this->lienfichier->storeAs('ressources/doyennes', $fileName, 'public');
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
            $filePath = $this->lienfichier->storeAs('ressources/doyennes', $fileName, 'public');
            $data['file'] = $filePath;
            $ressource->update($data);
        }

        $this->resetForm();
        $this->dispatch('ressourceUpdated');
        session()->flash('message', 'Ressource modifiée avec succès.');
    }

    public function deleteRessource($id)
    {
         $ressource = Ressource::find($id);
        if ($ressource) {
            // Supprimer le fichier associé
            if ($ressource->file && Storage::disk('public')->exists($ressource->file)) {
                Storage::disk('public')->delete($ressource->file);
            }
            $ressource->delete();
            session()->flash('message', 'Ressource supprimée avec succès.');
        }
    }

    public function showRessource($id)
    {
        $ressource = Ressource::findOrFail($id);
        $this->dispatch('showRessourceDetail', $ressource);
    }

    private function resetForm()
    {
        $this->reset([
            'ressourceId', 'titre', 'description', 'typeressource', 'editMode'
        ]);
        $this->resetErrorBag();
    }
}
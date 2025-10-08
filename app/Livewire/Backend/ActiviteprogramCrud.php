<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Activiteprogramme;
use App\Models\Doyenne;
use App\Models\Paroisse;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Illuminate\Support\Str;

class ActiviteprogramCrud extends Component
{
    use WithPagination, WithFileUploads;

    public $searchTerm = '';
    public $editMode = false;
    public $activiteId;

    // Champs du formulaire
    public $titre = '';
    public $description = '';
    public $dateactivite = '';
    public $emplacement = '';
    public $typeactivite = '';
    public $image1 = null;
    public $image2 = null;
    public $image3 = null;
    public $doyenne_id = '';
    public $paroisse_id = '';
    public $slug = '';
    public $start_time = '';
    public $end_time = '';
        public $paroisses = [];

    protected $rules = [
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'dateactivite' => 'required|date',
        'emplacement' => 'required|string|max:255',
        'typeactivite' => 'required|string|max:255',
        'image1' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'image2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'image3' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'doyenne_id' => 'nullable|exists:doyennes,id',
        'paroisse_id' => 'nullable|exists:paroisses,id',
        'start_time' => 'nullable|date_format:H:i',
        'end_time' => 'nullable|date_format:H:i|after_or_equal:start_time',
    ];

    public function updatedTitre($value)
    {
        $this->slug = Str::slug($value);
    }

    public function render()
    {
        $query = Activiteprogramme::with(['doyenne', 'paroisse']);

        if ($this->searchTerm) {
            $query->where(function($q) {
                $q->where('titre', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('description', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('emplacement', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('typeactivite', 'like', '%'.$this->searchTerm.'%')
                  ->orWhereHas('doyenne', function($q2) {
                      $q2->where('designation', 'like', '%'.$this->searchTerm.'%');
                  })
                  ->orWhereHas('paroisse', function($q2) {
                      $q2->where('designation', 'like', '%'.$this->searchTerm.'%');
                  });
            });
        }

        $activites = $query->orderBy('dateactivite', 'desc')->paginate(10);
        $doyennes = Doyenne::all();

        return view('livewire.backend.activiteprogram-crud', [
            'activites' => $activites,
            'doyennes' => $doyennes,
        ])->layout('layouts.defaultbackend', ['title' => 'Activités Programmées']);
    }

    public function addActivite()
    {
        $this->validate();

        $data = [
            'titre' => $this->titre,
            'description' => $this->description,
            'dateactivite' => $this->dateactivite,
            'emplacement' => $this->emplacement,
            'typeactivite' => $this->typeactivite,
            'doyenne_id' => $this->doyenne_id,
            'paroisse_id' => $this->paroisse_id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'slug' => $this->slug ?: Str::slug($this->titre),
        ];

        // Gestion des images uploadées
        if ($this->image1) {
            $fileName = time() . '_1_' . $this->image1->getClientOriginalName();
            $filePath = $this->image1->storeAs('activites', $fileName, 'public');
            $data['image1'] = $filePath;
        }

        if ($this->image2) {
            $fileName = time() . '_2_' . $this->image2->getClientOriginalName();
            $filePath = $this->image2->storeAs('activites', $fileName, 'public');
            $data['image2'] = $filePath;
        }

        if ($this->image3) {
            $fileName = time() . '_3_' . $this->image3->getClientOriginalName();
            $filePath = $this->image3->storeAs('activites', $fileName, 'public');
            $data['image3'] = $filePath;
        }

        Activiteprogramme::create($data);

        $this->resetForm();
        // $this->dispatch('activiteAdded');
        session()->flash('message', 'Activité ajoutée avec succès.');
    }

    public function editActivite($id)
    {
        $activite = Activiteprogramme::findOrFail($id);

        $this->activiteId = $id;
        $this->titre = $activite->titre;
        $this->description = $activite->description;
        $this->dateactivite = $activite->dateactivite;
        $this->emplacement = $activite->emplacement;
        $this->typeactivite = $activite->typeactivite;
        $this->doyenne_id = $activite->doyenne_id;
        $this->paroisse_id = $activite->paroisse_id;
        $this->slug = $activite->slug;
        $this->start_time = $activite->start_time;
        $this->end_time = $activite->end_time;

        $this->editMode = true;
        $this->dispatch('openModal');
    }

    public function updateActivite()
    {
        $this->validate();

        $activite = Activiteprogramme::findOrFail($this->activiteId);

        $data = [
            'titre' => $this->titre,
            'description' => $this->description,
            'dateactivite' => $this->dateactivite,
            'emplacement' => $this->emplacement,
            'typeactivite' => $this->typeactivite,
            'doyenne_id' => $this->doyenne_id,
            'paroisse_id' => $this->paroisse_id,
            'slug' => $this->slug ?: Str::slug($this->titre),
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ];

        // Gestion des images uploadées
        $images = ['image1', 'image2', 'image3'];
        
        foreach ($images as $imageField) {
            if ($this->$imageField) {
                // Supprimer l'ancienne image
                if ($activite->$imageField && Storage::disk('public')->exists($activite->$imageField)) {
                    Storage::disk('public')->delete($activite->$imageField);
                }

                $fileName = time() . '_' . substr($imageField, -1) . '_' . $this->$imageField->getClientOriginalName();
                $filePath = $this->$imageField->storeAs('activites', $fileName, 'public');
                $data[$imageField] = $filePath;
            }
        }

        $activite->update($data);

        $this->resetForm();
        // $this->dispatch('activiteUpdated');
        session()->flash('message', 'Activité modifiée avec succès.');
    }

    public function deleteActivite($id)
    {
        LivewireAlert::title('Suppression Activité')
            ->text('Êtes-vous sûr de vouloir supprimer cette activité ?')
            ->asConfirm()
            ->onConfirm('deleteItem', ['id' => $id])
            ->show();
    }

    public function deleteItem($data)
    {
        $itemId = $data['id'];
        $activite = Activiteprogramme::find($itemId);
            
        if ($activite) {
            // Supprimer les images associées
            $images = ['image1', 'image2', 'image3'];
            foreach ($images as $imageField) {
                if ($activite->$imageField && Storage::disk('public')->exists($activite->$imageField)) {
                    Storage::disk('public')->delete($activite->$imageField);
                }
            }
            
            $activite->delete();
            
            LivewireAlert::title('Success')
                ->text('Activité supprimée avec succès')
                ->success()
                ->timer(5000)
                ->show();
            
            session()->flash('message', 'Activité supprimée avec succès.');
        }
    }

    public function toggleStatus($id)
    {
        $activite = Activiteprogramme::findOrFail($id);
        $activite->statut = $activite->statut === 'effectif' ? 'en attente' : 'effectif';
        $activite->save();

        session()->flash('message', 'Statut modifié avec succès.');
    }

    public function viewImage($imagePath)
    {
        if ($imagePath && Storage::disk('public')->exists($imagePath)) {
            return Storage::disk('public')->url($imagePath);
        }
        
        return null;
    }

    private function resetForm()
    {
        $this->reset([
            'activiteId', 'titre', 'description', 'dateactivite', 'emplacement',
            'typeactivite', 'image1', 'image2', 'image3', 
            'doyenne_id', 'paroisse_id', 'slug', 'editMode'
        ]);
        $this->resetErrorBag();
    }

    public function updatedDoyenneId($value)
    {
        // charger les paroisses associées à la doyenne sélectionnée si nécessaire
        $this->paroisses = Paroisse::where('doyenne_id', $value)->get();
    }

    public function removeImage($imageField)
    {
        if ($this->$imageField) {
            $this->$imageField = null;
        }
    }
}
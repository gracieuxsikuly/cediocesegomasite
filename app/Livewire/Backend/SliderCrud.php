<?php

namespace App\Livewire\Backend;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class SliderCrud extends Component
{
    use WithPagination, WithFileUploads;

    public $editMode = false;
    public $sliderId;
    public $titre = '';
    public $sous_titre = '';
    public $description = '';
    public $image = null;
    public $bouton_texte = 'Ressources';
    public $bouton_lien = '/nos-ressources';
    public $bouton_secondaire_texte = 'Rejoindre la croisade eucharistique';
    public $bouton_secondaire_lien = '/contact';
    public $ordre = 1;
    public $statut = 'actif';

    protected $rules = [
        'titre' => 'required|string|max:255',
        'sous_titre' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:500',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        'bouton_texte' => 'nullable|string|max:100',
        'bouton_lien' => 'nullable|string|max:255',
        'bouton_secondaire_texte' => 'nullable|string|max:150',
        'bouton_secondaire_lien' => 'nullable|string|max:255',
        'ordre' => 'required|integer|min:1',
        'statut' => 'required|in:actif,inactif',
    ];

    public function render()
    {
        return view('livewire.backend.slider-crud', [
            'sliders' => Slider::orderBy('ordre')->latest()->paginate(10),
            'recommendedSize' => '1920 x 1280 px (ratio 3:2, meme proportion que les images actuelles du template)',
        ])->layout('layouts.defaultbackend', ['title' => 'Gestion des sliders']);
    }

    public function createSlider()
    {
        $this->resetForm();
        $this->dispatch('openSliderModal');
    }

    public function addSlider()
    {
        $this->validate(['image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120'] + $this->rules);

        Slider::create($this->payload() + [
            'image' => $this->storeImage(),
        ]);

        $this->resetForm();
        $this->dispatch('sliderSaved');
        session()->flash('message', 'Slider ajoute avec succes.');
    }

    public function editSlider($id)
    {
        $slider = Slider::findOrFail($id);

        $this->sliderId = $id;
        $this->titre = $slider->titre;
        $this->sous_titre = $slider->sous_titre;
        $this->description = $slider->description;
        $this->bouton_texte = $slider->bouton_texte;
        $this->bouton_lien = $slider->bouton_lien;
        $this->bouton_secondaire_texte = $slider->bouton_secondaire_texte;
        $this->bouton_secondaire_lien = $slider->bouton_secondaire_lien;
        $this->ordre = $slider->ordre;
        $this->statut = $slider->statut;
        $this->editMode = true;
        $this->dispatch('openSliderModal');
    }

    public function updateSlider()
    {
        $this->validate();

        $slider = Slider::findOrFail($this->sliderId);
        $data = $this->payload();

        if ($this->image) {
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }
            $data['image'] = $this->storeImage();
        }

        $slider->update($data);

        $this->resetForm();
        $this->dispatch('sliderSaved');
        session()->flash('message', 'Slider modifie avec succes.');
    }

    public function deleteSlider($id)
    {
        LivewireAlert::title('Suppression slider')
            ->text('Voulez-vous supprimer ce slider ?')
            ->asConfirm()
            ->onConfirm('deleteItem', ['id' => $id])
            ->show();
    }

    public function deleteItem($data)
    {
        $slider = Slider::find($data['id']);
        if (! $slider) {
            return;
        }

        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();
        LivewireAlert::title('Succes')->text('Slider supprime avec succes')->success()->timer(5000)->show();
    }

    private function payload(): array
    {
        return [
            'titre' => $this->titre,
            'sous_titre' => $this->sous_titre,
            'description' => $this->description,
            'bouton_texte' => $this->bouton_texte,
            'bouton_lien' => $this->bouton_lien,
            'bouton_secondaire_texte' => $this->bouton_secondaire_texte,
            'bouton_secondaire_lien' => $this->bouton_secondaire_lien,
            'ordre' => $this->ordre,
            'statut' => $this->statut,
        ];
    }

    private function storeImage(): string
    {
        $fileName = time().'_'.$this->image->getClientOriginalName();

        return $this->image->storeAs('sliders', $fileName, 'public');
    }

    private function resetForm(): void
    {
        $this->reset(['sliderId', 'titre', 'sous_titre', 'description', 'image', 'editMode']);
        $this->bouton_texte = 'Ressources';
        $this->bouton_lien = '/nos-ressources';
        $this->bouton_secondaire_texte = 'Rejoindre la croisade eucharistique';
        $this->bouton_secondaire_lien = '/contact';
        $this->ordre = 1;
        $this->statut = 'actif';
        $this->resetErrorBag();
    }
}

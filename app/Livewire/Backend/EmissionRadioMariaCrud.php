<?php

namespace App\Livewire\Backend;

use App\Models\EmissionRadioMaria;
use App\Models\Paroisse;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class EmissionRadioMariaCrud extends Component
{
    use WithPagination, WithFileUploads;

    public $searchTerm = '';
    public $editMode = false;
    public $emissionId;
    public $titre = '';
    public $description = '';
    public $date_emission = '';
    public $paroisse_id = '';
    public $fichier_audio = null;
    public $statut = 'publie';

    protected $rules = [
        'titre' => 'required|string|max:255',
        'description' => 'nullable|string',
        'date_emission' => 'required|date',
        'paroisse_id' => 'required|exists:paroisses,id',
        'fichier_audio' => 'nullable|file|mimes:mp3,mpga,wav,ogg,m4a|max:102400',
        'statut' => 'required|in:brouillon,publie',
    ];

    protected $messages = [
        'fichier_audio.required' => 'Veuillez selectionner un fichier audio.',
        'fichier_audio.file' => 'Le fichier audio selectionne est invalide.',
        'fichier_audio.mimes' => 'Le fichier audio doit etre au format mp3, wav, ogg ou m4a.',
        'fichier_audio.max' => 'Le fichier audio ne doit pas depasser 100 Mo.',
        'fichier_audio.uploaded' => 'Le fichier audio n\'a pas pu etre envoye. Verifiez la taille maximale autorisee par PHP et la connexion pendant l\'upload.',
    ];

    public function render()
    {
        $query = EmissionRadioMaria::with('paroisse.doyenne');

        if ($this->searchTerm) {
            $query->where(function ($subQuery) {
                $subQuery->where('titre', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('description', 'like', '%'.$this->searchTerm.'%')
                    ->orWhereHas('paroisse', function ($paroisseQuery) {
                        $paroisseQuery->where('designation', 'like', '%'.$this->searchTerm.'%');
                    });
            });
        }

        return view('livewire.backend.emission-radio-maria-crud', [
            'emissions' => $query->orderByDesc('date_emission')->paginate(10),
            'paroisses' => Paroisse::with('doyenne')->orderBy('designation')->get(),
        ])->layout('layouts.defaultbackend', ['title' => 'Emissions Radio Maria']);
    }

    public function createEmission()
    {
        $this->resetForm();
        $this->dispatch('openModal');
    }

    public function addEmission()
    {
        $this->validate([
            'fichier_audio' => 'required|file|mimes:mp3,mpga,wav,ogg,m4a|max:102400',
        ] + $this->rules);

        $filePath = $this->storeAudioFile();

        EmissionRadioMaria::create([
            'titre' => $this->titre,
            'description' => $this->description,
            'date_emission' => $this->date_emission,
            'paroisse_id' => $this->paroisse_id,
            'fichier_audio' => $filePath,
            'statut' => $this->statut,
        ]);

        $this->resetForm();
        $this->dispatch('emissionAdded');
        session()->flash('message', 'Emission Radio Maria ajoutee avec succes.');
    }

    public function editEmission($id)
    {
        $emission = EmissionRadioMaria::findOrFail($id);

        $this->emissionId = $id;
        $this->titre = $emission->titre;
        $this->description = $emission->description;
        $this->date_emission = optional($emission->date_emission)->format('Y-m-d');
        $this->paroisse_id = $emission->paroisse_id;
        $this->statut = $emission->statut;
        $this->editMode = true;
        $this->dispatch('openModal');
    }

    public function updateEmission()
    {
        $this->validate();

        $emission = EmissionRadioMaria::findOrFail($this->emissionId);
        $data = [
            'titre' => $this->titre,
            'description' => $this->description,
            'date_emission' => $this->date_emission,
            'paroisse_id' => $this->paroisse_id,
            'statut' => $this->statut,
        ];

        if ($this->fichier_audio) {
            if ($emission->fichier_audio && Storage::disk('public')->exists($emission->fichier_audio)) {
                Storage::disk('public')->delete($emission->fichier_audio);
            }

            $data['fichier_audio'] = $this->storeAudioFile();
        }

        $emission->update($data);

        $this->resetForm();
        $this->dispatch('emissionUpdated');
        session()->flash('message', 'Emission Radio Maria modifiee avec succes.');
    }

    public function deleteEmission($id)
    {
        LivewireAlert::title('Suppression emission')
            ->text('Etes-vous sur de vouloir supprimer cette emission ?')
            ->asConfirm()
            ->onConfirm('deleteItem', ['id' => $id])
            ->show();
    }

    public function deleteItem($data)
    {
        $emission = EmissionRadioMaria::find($data['id']);

        if (! $emission) {
            return;
        }

        if ($emission->fichier_audio && Storage::disk('public')->exists($emission->fichier_audio)) {
            Storage::disk('public')->delete($emission->fichier_audio);
        }

        $emission->delete();

        LivewireAlert::title('Succes')
            ->text('Emission supprimee avec succes')
            ->success()
            ->timer(5000)
            ->show();
    }

    private function storeAudioFile()
    {
        $fileName = time().'_'.$this->fichier_audio->getClientOriginalName();

        return $this->fichier_audio->storeAs('emissions-radio-maria', $fileName, 'public');
    }

    private function resetForm()
    {
        $this->reset([
            'emissionId',
            'titre',
            'description',
            'date_emission',
            'paroisse_id',
            'fichier_audio',
            'editMode',
        ]);
        $this->statut = 'publie';
        $this->resetErrorBag();
    }
}

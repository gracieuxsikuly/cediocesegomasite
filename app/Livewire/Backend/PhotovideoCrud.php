<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PhotoVideo;
use App\Models\Doyenne;
use App\Models\Paroisse;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class PhotovideoCrud extends Component
{
    use WithPagination, WithFileUploads;

    public $searchTerm = '';
    public $editMode = false;
    public $photoVideoId;

    // Champs du formulaire
    public $designation = '';
    public $lien = [];
    public $doyenne_id = '';
    public $paroisse_id = '';

    protected $rules = [
        'designation' => 'required|string|max:255',
        'lien' => 'required|array|min:1',
        'lien.*' => 'file|mimes:jpg,jpeg,png,gif,mp4,avi,mov,wmv|max:10240', // 10MB max pour les vidéos
        'doyenne_id' => 'nullable|exists:doyennes,id',
        'paroisse_id' => 'nullable|exists:paroisses,id',
    ];

    public function render()
    {
        $query = PhotoVideo::with(['doyenne', 'paroisse']);

        if ($this->searchTerm) {
            $query->where(function($q) {
                $q->where('designation', 'like', '%'.$this->searchTerm.'%')
                  ->orWhereHas('doyenne', function($q2) {
                      $q2->where('designation', 'like', '%'.$this->searchTerm.'%');
                  })
                  ->orWhereHas('paroisse', function($q2) {
                      $q2->where('designation', 'like', '%'.$this->searchTerm.'%');
                  });
            });
        }

        $photosVideos = $query->orderBy('id', 'desc')->paginate(10);
        $doyennes = Doyenne::all();
        $paroisses = Paroisse::all();

        return view('livewire.backend.photovideo-crud', [
            'photosVideos' => $photosVideos,
            'doyennes' => $doyennes,
            'paroisses' => $paroisses
        ])->layout('layouts.defaultbackend', ['title' => 'Photo & Vidéo']);
    }

    public function addPhotoVideo()
    {
        $this->validate();

        // Traitement de chaque fichier uploadé
        $uploadedFiles = [];
        foreach ($this->lien as $file) {
            $fileName = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
            
            // Déterminer le dossier en fonction du type de fichier
            $fileType = $this->getFileType($file);
            $folder = $fileType === 'video' ? 'videos' : 'photos';
            $filePath = $file->storeAs("photovideo/{$folder}", $fileName, 'public');
            $uploadedFiles[] = $filePath;
        }

        // Créer une entrée pour chaque fichier
        foreach ($uploadedFiles as $filePath) {
            PhotoVideo::create([
                'designation' => $this->designation,
                'liens' => $filePath,
                'doyenne_id' => $this->doyenne_id,
                'paroisse_id' => $this->paroisse_id,
            ]);
        }

        $this->resetForm();
        $this->dispatch('photoVideoAdded');
        session()->flash('message', count($uploadedFiles) . ' fichier(s) ajouté(s) avec succès.');
    }

    public function editPhotoVideo($id)
    {
        $photoVideo = PhotoVideo::findOrFail($id);

        $this->photoVideoId = $id;
        $this->designation = $photoVideo->designation;
        $this->doyenne_id = $photoVideo->doyenne_id;
        $this->paroisse_id = $photoVideo->paroisse_id;

        $this->editMode = true;
        $this->dispatch('openModal');
    }

    public function updatePhotoVideo()
    {
        $this->validate([
            'designation' => 'required|string|max:255',
            'lien' => 'nullable|array',
            'lien.*' => 'file|mimes:jpg,jpeg,png,gif,mp4,avi,mov,wmv|max:10240',
            'doyenne_id' => 'nullable|exists:doyennes,id',
            'paroisse_id' => 'nullable|exists:paroisses,id',
        ]);

        $photoVideo = PhotoVideo::findOrFail($this->photoVideoId);

        $data = [
            'designation' => $this->designation,
            'doyenne_id' => $this->doyenne_id,
            'paroisse_id' => $this->paroisse_id,
        ];

        // Gestion des nouveaux fichiers uploadés
        if ($this->lien && count($this->lien) > 0) {
            // Supprimer l'ancien fichier
            if ($photoVideo->lien && Storage::disk('public')->exists($photoVideo->lien)) {
                Storage::disk('public')->delete($photoVideo->lien);
            }

            // Traitement du premier fichier (pour l'édition, on garde un seul fichier)
            $file = $this->lien[0];
            $fileName = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
            $fileType = $this->getFileType($file);
            $folder = $fileType === 'video' ? 'videos' : 'photos';
            $filePath = $file->storeAs("photovideo/{$folder}", $fileName, 'public');
            
            $data['lien'] = $filePath;
        }

        $photoVideo->update($data);

        $this->resetForm();
        $this->dispatch('photoVideoUpdated');
        session()->flash('message', 'Photo/Vidéo modifiée avec succès.');
    }

    public function deletePhotoVideo($id)
    {
        LivewireAlert::title('Suppression Photo/Vidéo')
            ->text('Êtes-vous sûr de vouloir supprimer cet élément ?')
            ->asConfirm()
            ->onConfirm('deleteItem', ['id' => $id])
            ->show();
    }

    public function deleteItem($data)
    {
        $itemId = $data['id'];
        $photoVideo = PhotoVideo::find($itemId);
            
        if ($photoVideo) {
            // Supprimer le fichier associé
            if ($photoVideo->lien && Storage::disk('public')->exists($photoVideo->lien)) {
                Storage::disk('public')->delete($photoVideo->lien);
            }
            
            $photoVideo->delete();
            
            LivewireAlert::title('Success')
                ->text('Photo/Vidéo supprimée avec succès')
                ->success()
                ->timer(5000)
                ->show();
            
            session()->flash('message', 'Photo/Vidéo supprimée avec succès.');
        }
    }

    public function downloadFile($id)
    {
        $photoVideo = PhotoVideo::findOrFail($id);
        
        if ($photoVideo->lien && Storage::disk('public')->exists($photoVideo->lien)) {
            return Storage::disk('public')->download($photoVideo->lien);
        }
        
        session()->flash('error', 'Fichier non trouvé.');
        return redirect()->back();
    }

    public function viewFile($id)
    {
        $photoVideo = PhotoVideo::findOrFail($id);
        
        if ($photoVideo->lien && Storage::disk('public')->exists($photoVideo->lien)) {
            return Storage::disk('public')->url($photoVideo->lien);
        }
        
        return null;
    }

    /**
     * Détermine le type de fichier (photo ou vidéo)
     */
    private function getFileType($file)
    {
        $mimeType = $file->getMimeType();
        $imageMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $videoMimes = ['video/mp4', 'video/avi', 'video/mov', 'video/wmv'];

        if (in_array($mimeType, $imageMimes)) {
            return 'photo';
        } elseif (in_array($mimeType, $videoMimes)) {
            return 'video';
        }

        return 'other';
    }

    /**
     * Vérifie si un fichier est une image
     */
    public function isImage($filePath)
    {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        return in_array(strtolower($extension), $imageExtensions);
    }

    /**
     * Vérifie si un fichier est une vidéo
     */
    public function isVideo($filePath)
    {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $videoExtensions = ['mp4', 'avi', 'mov', 'wmv'];
        
        return in_array(strtolower($extension), $videoExtensions);
    }

    private function resetForm()
    {
        $this->reset([
            'photoVideoId', 'designation', 'lien', 
            'doyenne_id', 'paroisse_id', 'editMode'
        ]);
        $this->resetErrorBag();
    }

    /**
     * Supprime un fichier du tableau d'upload
     */
    public function removeUploadedFile($index)
    {
        if (isset($this->lien[$index])) {
            unset($this->lien[$index]);
            $this->lien = array_values($this->lien); // Réindexer le tableau
        }
    }
}
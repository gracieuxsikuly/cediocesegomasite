<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
   use Livewire\WithPagination;
   use App\Models\Ressource;

class RessourceLivewire extends Component
{
    use WithPagination;
    public function render()
    {
         $resources= Ressource::orderBy('created_at','DESC')->paginate(6);
        return view('livewire.frontend.ressource-livewire',[
             'resources'=>$resources,
        ])->layout('layouts.defaultfrontend', [
            'title' => 'Ressources spirituelles',
            'metaDescription' => 'Consultez, téléchargez et partagez les ressources spirituelles, documents, audios, vidéos et supports de la Croisade Eucharistique du Diocèse de Goma.',
            'metaImage' => asset('asset_frontend/images/logoce.png'),
            'metaUrl' => route('ressources'),
        ]);
    }
}

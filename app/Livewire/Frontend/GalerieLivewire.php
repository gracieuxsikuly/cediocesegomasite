<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\PhotoVideo;
use Livewire\WithPagination;

class GalerieLivewire extends Component
{
      use WithPagination;
    public function render()
    {
        $galeries=PhotoVideo::orderBy('id','desc')->paginate(6);
        $firstPhoto = PhotoVideo::orderBy('id','desc')->first();
        return view('livewire.frontend.galerie-livewire',[
            'galeries'=>$galeries,
        ])->layout('layouts.defaultfrontend', [
            'title' => 'Galerie photos',
            'metaDescription' => 'Découvrez et partagez les photos des activités, célébrations et événements de la Croisade Eucharistique du Diocèse de Goma.',
            'metaImage' => $firstPhoto?->liens ? asset('storage/' . $firstPhoto->liens) : asset('asset_frontend/images/logoce.png'),
            'metaUrl' => route('galleriephoto'),
        ]);
    }
}

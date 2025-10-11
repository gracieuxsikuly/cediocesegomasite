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
        return view('livewire.frontend.galerie-livewire',[
            'galeries'=>$galeries,
        ])->layout('layouts.defaultfrontend', ['title' => 'Galerie']);
    }
}

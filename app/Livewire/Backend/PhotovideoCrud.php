<?php

namespace App\Livewire\Backend;

use Livewire\Component;

class PhotovideoCrud extends Component
{
    public function render()
    {
        return view('livewire.backend.photovideo-crud')->layout('layouts.defaultbackend','title=Photovideo');
    }
}

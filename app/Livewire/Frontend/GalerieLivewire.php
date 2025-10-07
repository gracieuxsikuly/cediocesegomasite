<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class GalerieLivewire extends Component
{
    public function render()
    {
        return view('livewire.frontend.galerie-livewire')->layout('layouts.defaultfrontend', ['title' => 'Galerie']);
    }
}

<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class RessourceLivewire extends Component
{
    public function render()
    {
        return view('livewire.frontend.ressource-livewire')->layout('layouts.defaultfrontend', ['title' => 'Ressources']);
    }
}

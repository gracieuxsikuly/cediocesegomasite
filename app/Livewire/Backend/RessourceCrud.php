<?php

namespace App\Livewire\Backend;

use Livewire\Component;

class RessourceCrud extends Component
{
    public function render()
    {
        return view('livewire.backend.ressource-crud')->layout('layouts.defaultbackend','title=Ressource');
    }
}

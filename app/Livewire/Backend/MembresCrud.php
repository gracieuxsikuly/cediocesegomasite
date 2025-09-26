<?php

namespace App\Livewire\Backend;

use Livewire\Component;

class MembresCrud extends Component
{
    public function render()
    {
        return view('livewire.backend.membres-crud')->layout('layouts.defaultbackend','title=Membres');
    }
}

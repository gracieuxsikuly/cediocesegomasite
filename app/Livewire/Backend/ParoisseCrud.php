<?php

namespace App\Livewire\Backend;

use Livewire\Component;

class ParoisseCrud extends Component
{
    public function render()
    {
        return view('livewire.backend.paroisse-crud')->layout('layouts.defaultbackend','title=Paroisse');
    }
}

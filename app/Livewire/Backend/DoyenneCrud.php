<?php

namespace App\Livewire\Backend;

use Livewire\Component;

class DoyenneCrud extends Component
{
    public function render()
    {
        return view('livewire.backend.doyenne-crud')->layout('layouts.defaultbackend','title=Doyenne');
    }
}

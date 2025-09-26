<?php

namespace App\Livewire\Backend;

use Livewire\Component;

class RaportdoyenneCrud extends Component
{
    public function render()
    {
        return view('livewire.backend.raportdoyenne-crud')->layout('layouts.defaultbackend','title=Rapport Doyenne');
    }
}

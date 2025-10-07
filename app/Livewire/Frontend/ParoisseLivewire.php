<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class ParoisseLivewire extends Component
{
    public function render()
    {
        return view('livewire.frontend.paroisse-livewire')->layout('layouts.defaultfrontend', ['title' => 'Paroisse']);
    }
}

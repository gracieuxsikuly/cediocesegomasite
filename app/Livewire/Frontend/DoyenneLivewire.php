<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class DoyenneLivewire extends Component
{
    public function render()
    {
        return view('livewire.frontend.doyenne-livewire')->layout('layouts.defaultfrontend', ['title' => 'Doyenne']);
    }
}

<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class ActiviteLivewire extends Component
{
    public function render()
    {
        return view('livewire.frontend.activite-livewire')->layout('layouts.defaultfrontend', ['title' => 'Activités']);
    }
}

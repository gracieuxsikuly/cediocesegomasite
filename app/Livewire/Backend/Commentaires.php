<?php

namespace App\Livewire\Backend;

use Livewire\Component;

class Commentaires extends Component
{
    public function render()
    {
        return view('livewire.backend.commentaires')->layout('layouts.defaultbackend','title=Commentaires');
    }
}

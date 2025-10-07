<?php

namespace App\Livewire\Backend;

use Livewire\Component;

class Contacts extends Component
{
    public function render()
    {
        return view('livewire.backend.contacts')->layout('layouts.defaultbackend','title=Contacts');
    }
}
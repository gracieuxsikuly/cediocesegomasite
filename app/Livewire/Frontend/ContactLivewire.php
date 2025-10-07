<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class ContactLivewire extends Component
{
    public function render()
    {
        return view('livewire.frontend.contact-livewire')->layout('layouts.defaultfrontend', ['title' => 'Contact']);
    }
}

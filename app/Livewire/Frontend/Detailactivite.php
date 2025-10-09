<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Detailactivite extends Component
{
    public $slug;
    public function render()
    {
        dd($this->slug);
        return view('livewire.frontend.detailactivite');
    }
}

<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
   use Livewire\WithPagination;
   use App\Models\Ressource;

class RessourceLivewire extends Component
{
    use WithPagination;
    public function render()
    {
         $resources= Ressource::orderBy('created_at','DESC')->paginate(6);
        return view('livewire.frontend.ressource-livewire',[
             'resources'=>$resources,
        ])->layout('layouts.defaultfrontend', ['title' => 'Ressources']);
    }
}

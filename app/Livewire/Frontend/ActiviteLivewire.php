<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
   use Livewire\WithPagination;
   use App\Models\Activiteprogramme;
class ActiviteLivewire extends Component
{
 
      use WithPagination;
    public function render()
    {
         $activities=Activiteprogramme::where('statut','effectif')->orderBy('dateactivite','DESC')->paginate(6);
        return view('livewire.frontend.activite-livewire',[
            'activities'=>$activities,
        ])->layout('layouts.defaultfrontend', ['title' => 'Activités']);
    }
}

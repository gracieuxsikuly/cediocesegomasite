<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Niamwezi;
use App\Models\Activiteprogramme;
use App\Models\Ressource;
class Index extends Component
{
    public $mois;
    public $designation;
public function mount()
    {
        $niaye = Niamwezi::where('statut','actif')->first();
        if ($niaye) {
            $this->mois = $niaye->mois;
            $this->designation = $niaye->designation;
        } else {
            $this->mois = "Aucune Niya pour ce mois";
            $this->designation = "";
        }
    }
    public function render()
    {
        $activities=Activiteprogramme::where('statut','effectif')->orderBy('dateactivite','DESC')->take(3)->get();
        $resources= Ressource::orderBy('created_at','DESC')->take(3)->get();
        return view('livewire.frontend.index',[
            'activities'=>$activities,
            'resources'=>$resources,
        ])->layout('layouts.defaultfrontend', ['title' => 'Accueil']);
    }
}

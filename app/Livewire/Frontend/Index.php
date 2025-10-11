<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Niamwezi;
use App\Models\Activiteprogramme;
use App\Models\Ressource;
use App\Models\Countmember;
class Index extends Component
{
    public $mois;
    public $designation;

    public $count_croisions=0;
    public $count_feunouveau=0;
    public $count_cadets=0;
    public $count_equaps=0;
    public $total_ce=0;
    
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
        $count_ = Countmember::where('annee',date('Y'))->first();
        if ($count_) {
            $this->count_croisions = $count_->count_croisillons;
            $this->count_feunouveau = $count_->count_feunouveau;
            $this->count_cadets = $count_->count_cadets;
            $this->count_equaps = $count_->count_equap;
        }
        $this->total_ce = $this->count_croisions + $this->count_feunouveau + $this->count_cadets + $this->count_equaps;
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

<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Niamwezi;
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
        return view('livewire.frontend.index')->layout('layouts.defaultfrontend', ['title' => 'Accueil']);
    }
}

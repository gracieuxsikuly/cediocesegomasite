<?php

namespace App\Livewire\Backend;

use App\Models\Activiteprogramme;
use App\Models\Doyenne;
use App\Models\Paroisse;
use Livewire\Component;

class Dashboardpage extends Component
{
  public $totalDoyn;
    public $totalParois;
    public $totalActivite;
    public function render()
    {
            $this->totalDoyn = Doyenne::count();
            $this->totalParois = Paroisse::count();
            $this->totalActivite = Activiteprogramme::count();
        return view('livewire.backend.dashboardpage')->layout('layouts.defaultbackend',['title' => 'Dashboard']);
    }
}

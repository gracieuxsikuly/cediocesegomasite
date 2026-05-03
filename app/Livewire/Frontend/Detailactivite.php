<?php

namespace App\Livewire\Frontend;

use App\Models\Activiteprogramme;
use Livewire\Component;

class Detailactivite extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $activity = Activiteprogramme::with(['doyenne', 'paroisse'])
            ->where('slug', $this->slug)
            ->firstOrFail();

        return view('livewire.frontend.detailactivite', [
            'activity' => $activity,
        ])->layout('layouts.defaultfrontend', ['title' => $activity->titre]);
    }
}

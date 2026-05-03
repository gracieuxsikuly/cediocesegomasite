<?php

namespace App\Livewire\Frontend;

use App\Models\Activiteprogramme;
use Illuminate\Support\Str;
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

        $description = Str::limit(strip_tags($activity->description ?? ''), 160);

        return view('livewire.frontend.detailactivite', [
            'activity' => $activity,
        ])->layout('layouts.defaultfrontend', [
            'title' => $activity->titre,
            'metaDescription' => $description ?: 'Découvrez cette activité de la Croisade Eucharistique du Diocèse de Goma.',
            'metaImage' => $activity->image1 ? asset('storage/' . $activity->image1) : asset('asset_frontend/images/logoce.png'),
            'metaUrl' => route('detailactivite', ['slug' => $activity->slug]),
            'metaType' => 'article',
        ]);
    }
}

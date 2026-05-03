<?php

namespace App\Livewire\Frontend;

use App\Models\Doyenne;
use Livewire\Component;
use Livewire\WithPagination;

class DoyenneLivewire extends Component
{
    use WithPagination;

    public $searchTerm = '';

    public function render()
    {
        $doyennes = Doyenne::withCount('paroisses')
            ->with(['paroisses' => function ($query) {
                $query->orderBy('designation');
            }])
            ->when($this->searchTerm, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('designation', 'like', '%'.$this->searchTerm.'%')
                        ->orWhere('localisation', 'like', '%'.$this->searchTerm.'%')
                        ->orWhere('responsable', 'like', '%'.$this->searchTerm.'%')
                        ->orWhereHas('paroisses', function ($paroisseQuery) {
                            $paroisseQuery->where('designation', 'like', '%'.$this->searchTerm.'%')
                                ->orWhere('localisation', 'like', '%'.$this->searchTerm.'%');
                        });
                });
            })
            ->orderBy('designation')
            ->paginate(6);

        return view('livewire.frontend.doyenne-livewire', [
            'doyennes' => $doyennes,
        ])->layout('layouts.defaultfrontend', ['title' => 'Doyennes']);
    }
}

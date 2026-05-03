<?php

namespace App\Livewire\Frontend;

use App\Models\EmissionRadioMaria;
use App\Models\Paroisse;
use Livewire\Component;
use Livewire\WithPagination;

class EmissionRadioMariaLivewire extends Component
{
    use WithPagination;

    public $paroisseId = '';
    public $dateEmission = '';
    public $searchTerm = '';

    public function updatingParoisseId()
    {
        $this->resetPage();
    }

    public function updatingDateEmission()
    {
        $this->resetPage();
    }

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = EmissionRadioMaria::with('paroisse.doyenne')
            ->where('statut', 'publie')
            ->when($this->paroisseId, function ($subQuery) {
                $subQuery->where('paroisse_id', $this->paroisseId);
            })
            ->when($this->dateEmission, function ($subQuery) {
                $subQuery->whereDate('date_emission', $this->dateEmission);
            })
            ->when($this->searchTerm, function ($subQuery) {
                $subQuery->where(function ($searchQuery) {
                    $searchQuery->where('titre', 'like', '%'.$this->searchTerm.'%')
                        ->orWhere('description', 'like', '%'.$this->searchTerm.'%')
                        ->orWhereHas('paroisse', function ($paroisseQuery) {
                            $paroisseQuery->where('designation', 'like', '%'.$this->searchTerm.'%');
                        });
                });
            })
            ->orderByDesc('date_emission');

        return view('livewire.frontend.emission-radio-maria-livewire', [
            'latestEmission' => (clone $query)->first(),
            'emissions' => $query->paginate(6),
            'paroisses' => Paroisse::with('doyenne')->orderBy('designation')->get(),
        ])->layout('layouts.defaultfrontend', ['title' => 'Emissions Radio Maria']);
    }
}

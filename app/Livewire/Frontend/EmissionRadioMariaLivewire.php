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
    public $emission = '';

    protected $queryString = [
        'emission' => ['except' => ''],
    ];

    public function updatingParoisseId()
    {
        $this->emission = '';
        $this->resetPage();
    }

    public function updatingDateEmission()
    {
        $this->emission = '';
        $this->resetPage();
    }

    public function updatingSearchTerm()
    {
        $this->emission = '';
        $this->resetPage();
    }

    public function recordListen($emissionId)
    {
        EmissionRadioMaria::whereKey($emissionId)
            ->where('statut', 'publie')
            ->increment('nombre_ecoutes');

        $this->skipRender();
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

        $selectedEmission = $this->emission
            ? EmissionRadioMaria::with('paroisse.doyenne')
                ->where('statut', 'publie')
                ->find($this->emission)
            : null;

        return view('livewire.frontend.emission-radio-maria-livewire', [
            'latestEmission' => $selectedEmission ?: (clone $query)->first(),
            'emissions' => $query->paginate(6),
            'topEmissions' => EmissionRadioMaria::with('paroisse.doyenne')
                ->where('statut', 'publie')
                ->orderByDesc('nombre_ecoutes')
                ->orderByDesc('date_emission')
                ->take(3)
                ->get(),
            'paroisses' => Paroisse::with('doyenne')->orderBy('designation')->get(),
        ])->layout('layouts.defaultfrontend', ['title' => 'Emissions Radio Maria']);
    }
}

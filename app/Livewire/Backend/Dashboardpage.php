<?php

namespace App\Livewire\Backend;

use App\Models\Activiteprogramme;
use App\Models\Bien;
use App\Models\Contact;
use App\Models\Doyenne;
use App\Models\DocumentElectronique;
use App\Models\EmissionRadioMaria;
use App\Models\Membre;
use App\Models\MouvementFinancier;
use App\Models\Paroisse;
use App\Models\Rapportdoyenne;
use App\Models\Ressource;
use Livewire\Component;

class Dashboardpage extends Component
{
    public function render()
    {
    $user = auth()->user();

    $cards = collect([
      [
        'label' => 'Doyennes',
        'value' => Doyenne::count(),
        'icon' => 'bx bx-group',
        'color' => 'primary',
        'area' => 'data_management',
      ],
      [
        'label' => 'Paroisses',
        'value' => Paroisse::count(),
        'icon' => 'bx bx-church',
        'color' => 'success',
        'area' => 'data_management',
      ],
      [
        'label' => 'Membres',
        'value' => Membre::count(),
        'icon' => 'bx bx-user',
        'color' => 'info',
        'area' => 'data_management',
      ],
      [
        'label' => 'Rapports doyennes',
        'value' => Rapportdoyenne::count(),
        'icon' => 'bx bx-file-blank',
        'color' => 'warning',
        'area' => 'data_management',
      ],
      [
        'label' => 'Activites',
        'value' => Activiteprogramme::count(),
        'icon' => 'bx bx-calendar-event',
        'color' => 'danger',
        'area' => 'activities_resources',
      ],
      [
        'label' => 'Ressources',
        'value' => Ressource::count(),
        'icon' => 'bx bx-book-bookmark',
        'color' => 'secondary',
        'area' => 'activities_resources',
      ],
      [
        'label' => 'Emissions Radio Maria',
        'value' => EmissionRadioMaria::count(),
        'icon' => 'bx bx-radio',
                'color' => 'primary',
        'area' => 'radio_maria',
      ],
      [
        'label' => 'Messages contact',
        'value' => Contact::count(),
        'icon' => 'bx bx-envelope',
        'color' => 'dark',
        'area' => 'messages',
      ],
      [
        'label' => 'Documents classes',
        'value' => DocumentElectronique::count(),
        'icon' => 'bx bx-folder',
        'color' => 'primary',
        'area' => 'documents',
      ],
      [
        'label' => 'Biens en stock',
        'value' => Bien::sum('quantite'),
        'icon' => 'bx bx-package',
        'color' => 'success',
        'area' => 'stock',
      ],
      [
        'label' => 'Solde caisse',
        'value' => MouvementFinancier::where('type', 'revenu')->sum('montant') - MouvementFinancier::where('type', 'depense')->sum('montant'),
        'icon' => 'bx bx-wallet',
        'color' => 'info',
        'area' => 'finance',
      ],
    ])->filter(fn ($card) => $user?->canAccess($card['area']))->values();

    $quickLinks = collect([
      ['label' => 'Ajouter une activite', 'route' => 'activite', 'area' => 'activities_resources', 'icon' => 'bx bx-calendar-plus'],
      ['label' => 'Publier une ressource', 'route' => 'ressource', 'area' => 'activities_resources', 'icon' => 'bx bx-upload'],
      ['label' => 'Ajouter une emission', 'route' => 'emissions.radio-maria', 'area' => 'radio_maria', 'icon' => 'bx bx-radio'],
      ['label' => 'Gerer les paroisses', 'route' => 'paroisse', 'area' => 'data_management', 'icon' => 'bx bx-church'],
      ['label' => 'Rapports doyennes', 'route' => 'raportdoyenne', 'area' => 'data_management', 'icon' => 'bx bx-file'],
      ['label' => 'Classer un document', 'route' => 'documents.electroniques', 'area' => 'documents', 'icon' => 'bx bx-folder-plus'],
      ['label' => 'Gerer les biens', 'route' => 'biens', 'area' => 'stock', 'icon' => 'bx bx-package'],
      ['label' => 'Operation de caisse', 'route' => 'caisse', 'area' => 'finance', 'icon' => 'bx bx-wallet'],
    ])->filter(fn ($link) => $user?->canAccess($link['area']))->values();

    return view('livewire.backend.dashboardpage', [
      'cards' => $cards,
      'quickLinks' => $quickLinks,
      'recentActivities' => Activiteprogramme::with(['doyenne', 'paroisse'])->latest()->take(5)->get(),
      'recentEmissions' => EmissionRadioMaria::with('paroisse')->latest('date_emission')->take(5)->get(),
      'roleLabel' => $user?->roleLabel() ?? 'Utilisateur',
    ])->layout('layouts.defaultbackend',['title' => 'Dashboard']);
    }
}

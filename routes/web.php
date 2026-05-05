<?php

use App\Livewire\Backend\Dashboardpage;
use App\Livewire\Backend\ActiviteprogramCrud;
use App\Livewire\Backend\Commentaires;
use App\Livewire\Backend\DoyenneCrud;
use App\Livewire\Backend\MembresCrud;
use App\Livewire\Backend\ParoisseCrud;
use App\Livewire\Backend\RaportdoyenneCrud;
use App\Livewire\Backend\RessourceCrud;
use App\Livewire\Backend\PhotovideoCrud;
use App\Livewire\Backend\EmissionRadioMariaCrud;
use App\Livewire\Backend\DocumentElectroniqueCrud;
use App\Livewire\Backend\BienCrud;
use App\Livewire\Backend\MouvementFinancierCrud;
use App\Livewire\Backend\ProfileEdit;
use App\Livewire\Backend\SliderCrud;
use App\Livewire\Backend\UserCrud;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendShareController;
use App\Livewire\Backend\NiyaMwezi;
use App\Livewire\Backend\Contacts;
use App\Livewire\Backend\Countmembers;

use App\Livewire\Frontend\Index;
use App\Livewire\Frontend\ActiviteLivewire;
use App\Livewire\Frontend\ContactLivewire;
use App\Livewire\Frontend\DoyenneLivewire;
use App\Livewire\Frontend\GalerieLivewire;
use App\Livewire\Frontend\AboutLivewire;
use App\Livewire\Frontend\RessourceLivewire;
use App\Livewire\Frontend\Detailactivite;
use App\Livewire\Frontend\EmissionRadioMariaLivewire;

Route::get('/', function () {
    return redirect()->route('acceuil');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Dashboardpage::class)
        ->middleware('role:admin,user,activites_ressources,radio_maria,manager_donnees,secretariat,zelateur,tresorerie')
        ->name('dashboard');
    Route::get('/admin/profil', ProfileEdit::class)
        ->middleware('role:admin,user,activites_ressources,radio_maria,manager_donnees,secretariat,zelateur,tresorerie')
        ->name('profile.backend');
    Route::get('/admin/utilisateurs', UserCrud::class)
        ->middleware('role:admin,zelateur')
        ->name('utilisateurs');
    Route::get('/admin/sliders', SliderCrud::class)
        ->middleware('role:admin,zelateur,activites_ressources')
        ->name('sliders');
    Route::get('/activite', ActiviteprogramCrud::class)
        ->middleware('role:admin,user,activites_ressources')
        ->name('activite');
    Route::get('/commentaires', Commentaires::class)
        ->middleware('role:admin,user,activites_ressources')
        ->name('commentaires');
    Route::get('/doyenne', DoyenneCrud::class)
        ->middleware('role:admin,user,manager_donnees')
        ->name('doyenne');
    Route::get('/membres', MembresCrud::class)
        ->middleware('role:admin,user,manager_donnees')
        ->name('membres');
    Route::get('/paroisse', ParoisseCrud::class)
        ->middleware('role:admin,user,manager_donnees')
        ->name('paroisse');
    Route::get('/raportdoyenne', RaportdoyenneCrud::class)
        ->middleware('role:admin,user,manager_donnees')
        ->name('raportdoyenne');
    Route::get('/ressource', RessourceCrud::class)
        ->middleware('role:admin,user,activites_ressources')
        ->name('ressource');
    Route::get('/photovideo', PhotovideoCrud::class)
        ->middleware('role:admin,user,activites_ressources')
        ->name('photovideo');        
    Route::get('/niamwezis', NiyaMwezi::class)
       ->middleware('role:admin,user,manager_donnees')
       ->name('niamwezis');
    Route::get('/contacts', Contacts::class)
       ->middleware('role:admin,user,manager_donnees')
       ->name('contacts');
    Route::get('/countmembers', Countmembers::class)
       ->middleware('role:admin,user,manager_donnees')
       ->name('countmembers');
    Route::get('/admin/emissions-radio-maria', EmissionRadioMariaCrud::class)
         ->middleware('role:admin,radio_maria')
         ->name('emissions.radio-maria');
        Route::get('/admin/documents-electroniques', DocumentElectroniqueCrud::class)
            ->middleware('role:admin,secretariat,zelateur')
            ->name('documents.electroniques');
        Route::get('/admin/biens', BienCrud::class)
            ->middleware('role:admin,zelateur')
            ->name('biens');
        Route::get('/admin/caisse', MouvementFinancierCrud::class)
            ->middleware('role:admin,tresorerie,zelateur')
            ->name('caisse');
});
// frontend routes pour les frontend
Route::get('/acceuil', Index::class)->name('acceuil');
 Route::get('/apropos-de-nous',AboutLivewire::class)->name('aboutus');
  Route::get('/nos-doyenne',DoyenneLivewire::class)->name('doyennes');
    Route::get('/nos-activites',ActiviteLivewire::class)->name('activites');
      Route::get('/nos-ressources',RessourceLivewire::class)->name('ressources');
    Route::get('/emissions-radio-maria',EmissionRadioMariaLivewire::class)->name('emissions.radio-maria.frontend');
       Route::get('/notre-gallerie-photo',GalerieLivewire::class)->name('galleriephoto');
   Route::get('/contact',ContactLivewire::class)->name('contact');
Route::get('/detail-activite/{slug}',Detailactivite::class)->name('detailactivite');
Route::get('/partage/galerie', [FrontendShareController::class, 'gallery'])->name('partage.galerie');
Route::get('/partage/photo/{photo}', [FrontendShareController::class, 'photo'])->name('partage.photo');
Route::get('/partage/ressource/{resource}', [FrontendShareController::class, 'resource'])->name('partage.ressource');
Route::get('/partage/radio-maria/{emission}', [FrontendShareController::class, 'radioMaria'])->name('partage.radio-maria');


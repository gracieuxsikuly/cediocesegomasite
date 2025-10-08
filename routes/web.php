<?php

use App\Livewire\Backend\Dashboardpage;
use App\Livewire\Backend\ActiviteprogramCrud;
use App\Livewire\Backend\Commentaires;
use App\Livewire\Backend\contacts;
use App\Livewire\Backend\DoyenneCrud;
use App\Livewire\Backend\MembresCrud;
use App\Livewire\Backend\ParoisseCrud;
use App\Livewire\Backend\RaportdoyenneCrud;
use App\Livewire\Backend\RessourceCrud;
use App\Livewire\Backend\PhotovideoCrud;
use Illuminate\Support\Facades\Route;
use App\Livewire\Backend\NiyaMwezi;
use App\Livewire\Frontend\Index;
use App\Livewire\Frontend\ActiviteLivewire;
use App\Livewire\Frontend\ContactLivewire;
use App\Livewire\Frontend\DoyenneLivewire;
use App\Livewire\Frontend\GalerieLivewire;
use App\Livewire\Frontend\AboutLivewire;
use App\Livewire\Frontend\RessourceLivewire;
use App\Livewire\Frontend\Detailactivite;

Route::get('/', function () {
    return redirect()->route('acceuil');
});
// backend routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Dashboardpage::class)
        ->middleware('role:admin,user')
        ->name('dashboard');
    Route::get('/activite', ActiviteprogramCrud::class)
        ->middleware('role:admin,user')
        ->name('activite');
    Route::get('/commentaires', Commentaires::class)
        ->middleware('role:admin,user')
        ->name('commentaires');
    Route::get('/contacts', contacts::class)
        ->middleware('role:admin,user')
        ->name('contacts');
    Route::get('/doyenne', DoyenneCrud::class)
        ->middleware('role:admin,user')
        ->name('doyenne');
    Route::get('/membres', MembresCrud::class)
        ->middleware('role:admin,user')
        ->name('membres');
    Route::get('/paroisse', ParoisseCrud::class)
        ->middleware('role:admin,user')
        ->name('paroisse');
    Route::get('/raportdoyenne', RaportdoyenneCrud::class)
        ->middleware('role:admin,user')
        ->name('raportdoyenne');
    Route::get('/ressource', RessourceCrud::class)
        ->middleware('role:admin,user')
        ->name('ressource');
    Route::get('/photovideo', PhotovideoCrud::class)
        ->middleware('role:admin,user')
        ->name('photovideo');        
    Route::get('/niamwezis', NiyaMwezi::class)
       ->middleware('role:admin,user')
       ->name('niamwezis');
});
// frontend routes
Route::get('/acceuil', Index::class)->name('acceuil');
 Route::get('/apropos-de-nous',AboutLivewire::class)->name('aboutus');
  Route::get('/nos-doyenne',DoyenneLivewire::class)->name('doyennes');
    Route::get('/nos-activites',ActiviteLivewire::class)->name('activites');
      Route::get('/nos-ressources',RessourceLivewire::class)->name('ressources');
       Route::get('/notre-gallerie-photo',GalerieLivewire::class)->name('galleriephoto');
   Route::get('/contact',ContactLivewire::class)->name('contact');
Route::get('/detail-activite/{slug}',Detailactivite::class)->name('detailactivite');


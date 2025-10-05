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

// Route::get('/', function () {
//     return view('welcome');
// });

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


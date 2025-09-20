<?php

use App\Livewire\Backend\Dashboardpage;
use Illuminate\Support\Facades\Route;

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
});


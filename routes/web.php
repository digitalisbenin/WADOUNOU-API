<?php

use App\Http\Livewire\ShowAbonnements;
use App\Http\Livewire\ShowCommandes;
use App\Http\Livewire\ShowCommentaires;
use App\Http\Livewire\ShowLivraisons;
use App\Http\Livewire\ShowLivreurs;
use App\Http\Livewire\ShowRepas;
use App\Http\Livewire\ShowReservations;
use App\Http\Livewire\ShowRestaurants;
use App\Http\Livewire\ShowRoles;
use App\Http\Livewire\ShowUsers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'isAdmin'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/show-abonnements', ShowAbonnements::class)->name('show-abonnements');
    Route::get('/show-commandes', ShowCommandes::class)->name('show-commandes');
    Route::get('/show-commentaires', ShowCommentaires::class)->name('show-commentaires');
    Route::get('/show-livreurs', ShowLivreurs::class)->name('show-livreurs');
    Route::get('/show-livraisons', ShowLivraisons::class)->name('show-livraisons');
    Route::get('/show-roles', ShowRoles::class)->name('show-roles');
    Route::get('/show-users', ShowUsers::class)->name('show-users');
    Route::get('/show-reservations', ShowReservations::class)->name('show-reservations');
    Route::get('/show-repas', ShowRepas::class)->name('show-repas');
    Route::get('/show-restaurants', ShowRestaurants::class)->name('show-restaurants');
   
});


<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnuncementController;
use App\Http\Controllers\API\SocialAuthController;

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

// ROTTE PUBBLICHE
Route::get('/', [FrontController::class, 'homepage'])->name('homepage');
//* vista  profilo
Route::get('/profile', [FrontController::class, 'profile'])->middleware('auth')->name('profile');
//* vista su base Categoria
Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');


// ROTTE ARTICOLI
//* tutti gli articoli
Route::get('/annuncio/index', [AnnuncementController::class, 'index'])->name('annuncement.index');
//* creazione articolo
Route::get('/annuncio/create', [AnnuncementController::class, 'create'])->name('annuncement.create');
//* mostra singola articolo
Route::get('/annuncio/show/{annuncement}', [AnnuncementController::class, 'show'])->name('annuncement.show');
// *modifica articolo
Route::get('/annuncio/edit/{annuncement}', [AnnuncementController::class, 'edit'])->name('annuncement.edit');

//* Ricerca annuncio
Route::get('/ricerca/annuncio', [FrontController::class, 'searchAnnuncements'])->name('annuncements.search');


//gestione revisore

// *Home revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

// *Accetta Annuncio
Route::patch('/accetta/annuncio/{annuncement}', [RevisorController::class, 'acceptAnnuncement'])->middleware('isRevisor')->name('revisor.accept_annuncement');
// *Rifiuta annuncio
Route::patch('/rifiuta/annuncio/{annuncement}', [RevisorController::class, 'rejectAnnuncement'])->middleware('isRevisor')->name('revisor.reject_annuncement');
// *richiedi di diventare revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
// *rendi un utente revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
// prendi l'ultimo annuncio giudicato
Route::get('/ultimo/annuncio', [RevisorController::class, 'takeLastAnnuncement'])->middleware('isRevisor')->name('revisor.takeLastAnnuncement');
// *Accetta l'ultimo Annuncio
Route::patch('/accetta/ultimo/annuncio/{annuncement}', [RevisorController::class, 'acceptLastAnnuncement'])->middleware('isRevisor')->name('revisor.accept_last_annuncement');
// *Rifiuta l'ultimo annuncio
Route::patch('/rifiuta/ultimo/annuncio/{annuncement}', [RevisorController::class, 'rejectLastAnnuncement'])->middleware('isRevisor')->name('revisor.reject_last_annuncement');


// *cambio linguaggio
Route::post('/lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set_language_locale');

// *autenticazione Google
Route::get('auth/google', [SocialAuthController::class, 'redirectToProvider']);
Route::get('auth/google/callback', [SocialAuthController::class, 'handleCallback']);
    // $user->token


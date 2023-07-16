<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route pour la page d'accueil
Route::get('/', function () {
    return view('home');
});


// Définit les routes d'authentification
Auth::routes();


// Route pour la page d'accueil
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Ressource pour la gestion des utilisateurs (à l'exception de index, create et store)
Route::resource('/user', App\Http\Controllers\UserController::class)->except('index', 'create', 'store');


// Route pour mettre à jour le mot de passe de l'utilisateur
Route::put('/user/updatepassword/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatepassword');
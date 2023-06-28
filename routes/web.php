<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard'); // treba da se redirektuje na home ne na dashboard kao sto je bilo, ima i neki 2. nacin je u app/providers/rootserviceproviders linija 20 
})->middleware(['auth', 'verified'])->name('dashboard'); // name('dashboard') ime rute

Route::middleware('auth')->group(function () { // grupisane rute , gde korisnik mora da je logovan . url je kod svih isti /'profile'
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dole dodajemo nase rute koje su nam potrebne
});

require __DIR__.'/auth.php';

Auth::routes([ // ovo smo dodali da bi radilo bez register i ostalo
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

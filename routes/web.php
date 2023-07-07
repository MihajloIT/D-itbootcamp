<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PeopleController;
//use Illuminate\Support\Facades\App; // na ovoj ruti hvatamo klasu App koja nam je bitna za jezike-- ipak smo i ovo zakomentarisali jer je pravio gresku u zadnjoj liniji koda
use Illuminate\Support\Facades\Auth; // ovo sam ja sam dodao zbog klase vidim da je bila oznacena -> eli nije dodavala , vrv joj to nije trebalo

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
Route::get('/lang/{locale}',function (string $locale)
{
    //App::setLocale($locale);// ne moze samo ovo da se stavi jer to kratko traje,cim se predje na drugu stranicu nestaje, a mi imamo redirect back--kad smo zakomentarisali liniju 7 morali smo i ovo jer onda ovo nije radilo.Zapravo je ovo pozvano u middleware-u localization.php sessija 'locale'
    session(['locale' => $locale]); // ovo je sesija koja se postavlja da korisnik moze da menja jezik ,a da ne utice na druge korisnike
    return redirect()->back(); // povratak na predhodnu stranu, poslje ga daa uzme info i vrati na stranu sa koje je krenuo
})->whereIn('locale', ['en','sr'])->name('lang'); // ovo je naziv rute po kom se u blade-u poziva

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
    //Prikaz svih podataka
    Route::get('/genre', [GenreController::class, 'index'])->name('genre.index'); // zahtevamo da je korisnik logovan zato ovde pisemo
   

    // Ruta za kreiranje
    Route::get('/genre/create', [GenreController::class, 'create'])->name('genre.create');
    //Validacija podataka o upisu novog reda u tabelu, forma post metodom salje
    Route::post('/genre', [GenreController::class, 'store'])->name('genre.store');

    //Dodavanje putanja za Akciju
    Route::get('/genre/{genre}/edit', [GenreController::class, 'edit'])->name('genre.edit');

    //Izmena postojeceg podatka
    Route::put('/genre/{genre}', [GenreController::class, 'update'])->name('genre.update');

    Route::get('/people', [PeopleController::class, 'index'])->name('people.index');

    Route::get('/people/create', [PeopleController::class, 'create'])->name('people.create');

    Route::post('/people' , [PeopleController::class, 'store'])->name('people.store');

    Route::get('/people/{people}/edit' , [PeopleController::class, 'edit'])->name('people.edit');

    Route::put('/people/{people}', [PeopleController::class, 'update'])->name('people.update');

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

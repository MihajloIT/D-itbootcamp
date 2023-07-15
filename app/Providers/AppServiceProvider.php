<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */


     // Definisemo ovde kom layout-u zelimo da posaljemo info
    public function boot(): void
    {
        Paginator::useBootstrapFive();  // neki plaginator za bootstrap 5 odnosi se na redjanje podataka u redosled


        //view znaci da je view fajl-zatim folder layouts i fajl app(odnosi se na app.blade.php)
        view()->composer('layouts.app', function($view) // ovo smo ubacivali za prikaz na strinici ono en i sr za jezika ali nisam skontao kako radi
        {
            $view-> with('currentLoc', App::currentLocale());
            // $view smo uneli gore u funkciji , za prenos podataka koristimo opciju with('kako cemo nazvati parametar', 'Kako da izvadimo trenutno podesenu lokalizaciju za jezik')
            
        });
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;// ili ovo ili umesto session da se stavi cela putanja, ali bolje je ovako

use Illuminate\Support\Facades\App; 
class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // $request je parametar koji je doso, a $next je putanja(kaze nastavi putanjom kojom si doso : return$next($request))
    public function handle(Request $request, Closure $next): Response
    {
        //if se stavlja kad korisnik prvi put dodje na sajt on nema podesenu sesiju dok ne izabere jezik
        if(Session::exists('locale'))// ovo locale je zapravo kljuc iz web.php-a vezan za sesiju. Proverava da li je korisnik kliknuo na sesiju EN ili SR
        {
            App::setLocale(session('locale'));// session('locale') tako se stavlja locale za vrednost
        }
        return $next($request);
    }
}
 
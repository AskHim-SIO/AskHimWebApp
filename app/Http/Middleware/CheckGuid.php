<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CheckGuid
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Cookie::has('guid')) {
            $client = new Client();
            $guid = Cookie::get('guid');
            $r = $client->request('GET', "http://askhim.ctrempe.fr:8080/auth/token-valid?request=$guid");

            $r = $r->getBody();
            $r = $r->getContents();

            if ($r == 'true') {
                if(!Session::has('name')){
                    var_dump($r);
                    $r = $client->request('GET', "http://askhim.ctrempe.fr:8080/user/get-user/$guid");

                    $r = $r->getBody();
                    $r = json_decode($r);

                    session(['name' => $r->name]);
                    session(['firstname' => $r->firstname]);
                    session(['profilPicture' => $r->profilPicture]);
                }

                return $next($request);
            } else {
                Cookie::queue(Cookie::forget('guid'));

                session()->flush();

                return redirect()->route('login');
            }
        } else {
            return $next($request);
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

class Administrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // for lock admin dashboard route from regular users and guests

        $patern = '/^\/admin/m';
        $allowRoutesFrom = ['login', 'register'];
        $dontAllowRoutesFrom = ['home'];
        $authRoutes = ['/logout'];
        $LangsList = array_merge(Config::get('config-app.rtl-langs'), Config::get('config-app.ltr-langs'));

        $pathInfo = $request->getPathInfo();

        $routeToAdmin = preg_match_all(
            $patern,
            $pathInfo,
            $matches,
            PREG_SET_ORDER,
            0
        );

        $routeFrom = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();

        if (Auth::user()) {

            if (Auth::user()->role == "admin" && $routeToAdmin) {

                return $next($request);
            } elseif (Auth::user()->role !== "admin" && $routeToAdmin) {
                return redirect()->route('front');
            } elseif (Auth::user()->role !== "admin" && !$routeToAdmin) {
                return $next($request);
            } elseif (in_array($pathInfo, $authRoutes)) {
                return $next($request);
            } else {
                dd("1");
                abort('404', "NOT FOUND");
            }
        } else {
            if ($routeToAdmin){
                dd('2');
                abort('404', "NOT FOUND");
            }
           
            return $next($request);
        }

        // for lock admin dashboard route from regular users and guests

    }
}

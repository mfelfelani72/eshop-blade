<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RegisteredUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $paternProfile = '/^\/profile/';

        $pathInfo = $request->getPathInfo();

        $routeToProfile = preg_match_all(
            $paternProfile,
            $pathInfo,
            $matchesProfile,
            PREG_SET_ORDER,
            0
        );

        if (Auth::user()) {
            if (Auth::user()->role == "user" && $routeToProfile) {
                return $next($request);
            } else {
                abort('404', "NOT FOUND");
            }
        } else {

            if ($routeToProfile) {

                abort('404', "NOT FOUND");
            }

            // return $next($request);
        }
    }
}

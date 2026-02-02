<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(!empty($_SESSION["role"]) && Auth::check() && ($_SESSION["role"] == 'ADMIN' || $_SESSION["role"] == 'EMPLOYEE' || $_SESSION["role"] == 'CTV')){
            return $next($request);
        };
        return redirect()->route('login');
    }
}

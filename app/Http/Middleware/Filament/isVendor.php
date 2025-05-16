<?php

namespace App\Http\Middleware\filament;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isVendor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('vendor/login')) {
            return $next($request);
        }

        if(auth()->check()){
            return (auth()->user()->hasRole('vendor') ? $next($request) : (auth()->user()->hasRole('admin') ? redirect('/admin') : redirect('/')));
        }

        return redirect('/');
    }
}

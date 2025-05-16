<?php

namespace App\Http\Middleware\Filament;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('admin/login')) {
            return $next($request);
        }
    
        if (auth()->check() && auth()->user()->hasRole('admin')) {
            return $next($request);
        }
        
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $roles)
    {
        // Superadmin har doim ruxsat oladi
        if (auth()->check() && auth()->user()->role == 'superadmin') {
            return $next($request);
        }
    
        // Rollarni ajratib, massiv sifatida oling
        $rolesArray = explode('|', $roles);
    
        // Agar foydalanuvchida shu rollardan biri bo'lsa
        if (auth()->check() && in_array(auth()->user()->role, $rolesArray)) {
            return $next($request);
        }
    
        // Aks holda, ruxsat berilmagan sahifaga yo'naltiriladi
        return redirect('/')->with('error', 'Sizda ushbu sahifaga kirish huquqi yo‘q.');
    }
    

}

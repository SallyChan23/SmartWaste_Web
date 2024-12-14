<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
    
        $userRole = Auth::user()->role;
    
        // Jika $roles adalah string (misalnya 'user,admin'), pecah menjadi array
        if (count($roles) === 1 && str_contains($roles[0], ',')) {
            $roles = explode(',', $roles[0]);
        }
    
        \Log::info('User Role: ' . $userRole);
        \Log::info('Allowed Roles: ' . implode(', ', $roles));
    
        if (!in_array($userRole, $roles)) {
            return abort(403, 'Unauthorized');
        }
    
        return $next($request);
    }
    
}

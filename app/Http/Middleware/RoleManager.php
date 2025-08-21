<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route("login");
        }
        $userRole = Auth::user()->role;
        if ($role == "admin") {
            if ($userRole == 0) {
                return $next($request);
            }
        } else if ($role == "user") {
            if ($userRole == 1) {
                return $next($request);
            }
        }
        switch ($userRole) {
            case 0:
                return redirect()->intended(route('admin.dashboard', absolute: false));
                break;
            case 1:
                return redirect()->intended(route('dashboard', absolute: false));
                break;
        }
        return redirect(route('login'));
    }
}

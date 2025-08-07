<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();

            // Redirect berdasarkan role
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'user':
                    return redirect()->route('user.dashboard');
                case 'supervisor':
                    return redirect()->route('supervisor.dashboard');
                default:
                    abort(403, 'Unauthorized role');
            }
        }
    }

    return $next($request);
    }
}

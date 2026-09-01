<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckGuard
{
    private const GUARDS = [ 'admin', 'teacher', 'student', 'parent'];

    public function handle( Request $request, Closure $next, string $guard ): Response {

        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        if (Auth::guard($guard)->check()) {
            return $next($request);
        }

        foreach (self::GUARDS as $currentGuard) {

            if (Auth::guard($currentGuard)->check()) {
                // abort(403, 'Unauthorized access. You are logged in as a different user type.');
                abort(403, __('auth.unauthorized_different_user'));
            }
        }

        return redirect()->route('login');
    }

    public static function guard(): ?string
    {
        foreach (self::GUARDS as $guard) {
            if (Auth::guard($guard)->check()) {
                return $guard;
            }
        }
        return null;
    }

    public static function user()
    {
        $guard = self::guard();
        return $guard ? Auth::guard($guard)->user(): null;
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : route('login');
    // }
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (auth()->guard($guards)->check()) {
            return $next($request);
        }

        return redirect()->guest('/member/login');
    }
}

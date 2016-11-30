<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && $request->user()->isadmin == 1) {
            return $next($request);
        }
        /* | jika diakses oleh bukan admin redirect ke '/' | */
        return redirect()->guest('/');
    }
}

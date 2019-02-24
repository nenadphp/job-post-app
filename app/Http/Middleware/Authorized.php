<?php

namespace App\Http\Middleware;

use Closure;

class Authorized
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
        if ($request->hash != $request->user()->hash) {
            return redirect('/');
        }

        return $next($request);
    }
}

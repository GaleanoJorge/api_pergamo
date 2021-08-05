<?php

namespace App\Http\Middleware;

use Closure;

class RequiredRolByLog
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
        if ($request->method() != 'GET') {
            $request->validate(['role_id' => 'required']);
        }

        return $next($request);
    }
}

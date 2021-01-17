<?php

namespace App\Http\Middleware;

use Closure;

class AdminAccess
{
    public function handle($request, Closure $next)
    {
        if (empty($request->user()) || $request->user()->is_admin !== 1) {
            return abort(404);
        }

        return $next($request);
    }
}

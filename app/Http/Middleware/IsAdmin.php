<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Auth;
use Illuminate\Http\Request;

class IsAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->rank == 2) {
            return $next($request);
        }

        return response('Admin Only', 401);
    }
}

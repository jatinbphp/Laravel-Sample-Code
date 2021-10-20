<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Session;

class LockMiddleware
{

    /**
     * [handle description]
     * @param  [type]  $request [description]
     * @param  Closure $next    [description]
     * @param  [type]  $guard   [description]
     * @return [type]           [description]
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check() && Session::get('locked') == true) {
            return $next($request);
        }
        return redirect("/");
    }
}

<?php

namespace App\Http\Middleware;

use App\User;
use Auth;
use Closure;

class SecretMiddleware
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
        $secretId = $request->route()->parameter('userId');

        if (User::where('secret_id', $secretId)->exists()) {
            if (Auth::user()->secret_id == $secretId) {
                return redirect('/newsfeed');
            }
            return $next($request);
        }
        return redirect('/');
    }
}

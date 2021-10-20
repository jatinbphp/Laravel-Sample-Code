<?php

namespace App\Http\Middleware;

use Closure;

class LocaleMiddleware
{
    protected $languages = ['en', 'ro'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('locale') && in_array(session()->get('locale'), $this->languages)) {
            app()->setLocale(session()->get('locale'));
        }
        return $next($request);
    }
}

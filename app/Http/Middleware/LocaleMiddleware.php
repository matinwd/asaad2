<?php

namespace App\Http\Middleware;

use Closure;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // available language in template array
        $availLocale = config('translatable.locales');

        // Locale is enabled and allowed to be change
        if (session()->has('locale') && in_array(session()->get('locale'), $availLocale)) {
            // Set the Laravel locale
//            app()->setLocale(session()->get('locale'));
        }

        return $next($request);
    }
}

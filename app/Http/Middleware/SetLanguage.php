<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLanguage
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
        if (! in_array($request->language, ['en', 'de'])){
            return redirect('/en');
        }
        else{
            App::setLocale($request->language);
            return $next($request);
        }
    }
}

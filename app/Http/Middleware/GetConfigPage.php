<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class GetConfigPage
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

        // get config data
        $request["__config"] = getConfig(Route::currentRouteName());

        return $next($request);
    }
}

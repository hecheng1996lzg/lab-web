<?php

namespace App\Http\Middleware;

use Closure;

class Menu
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
        $menuActive = $request->input('menuActive');
        $menuActive = $menuActive? $menuActive:'';

        $scrollTime = $request->input('scrollTime');
        $scrollTime = $scrollTime? $scrollTime:1000;
        view()->share('menuActive',$menuActive);
        view()->share('scrollTime',$scrollTime);
        return $next($request);
    }
}

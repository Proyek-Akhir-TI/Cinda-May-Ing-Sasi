<?php

namespace App\Http\Middleware;

use Closure;

class Pelanggan
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
        if(session()->get('role') != 'pelanggan'){
            return redirect()->back();
        }
        return $next($request);
    }
}

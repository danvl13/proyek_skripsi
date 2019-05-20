<?php

namespace App\Http\Middleware;

use Closure;

class Pengurus
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
        //cek pengurus atau tidak
        // if(//bukan pengurus){
        //     //redirect ke home

        // }
        return $next($request);
    }
}

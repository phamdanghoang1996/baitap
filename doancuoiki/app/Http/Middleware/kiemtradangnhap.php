<?php

namespace App\Http\Middleware;

use Closure;

class kiemtradangnhap
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
        if($request->has("diem"))
            return $next($request);
        else 
            return redirect()->route('loi');
    }
}

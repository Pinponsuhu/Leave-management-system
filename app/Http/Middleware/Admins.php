<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admins
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->guard('admin')->check() == true){
            // dd(auth()->guard('admin')->check());
            return $next($request);
        }
        // dd(auth()->guard('admin')->check());

        return redirect('/admin/login');

    }
}

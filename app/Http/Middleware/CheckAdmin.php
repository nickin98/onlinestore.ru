<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
//        if (\Auth::check()) {
//            if (\Auth::user()->role == 'superadmin') {
//                return $next($request);
//            } else {
//                abort(404, 'У вас нет прав доступа для этой страницы');
//                return redirect()->route('index');
//            }
//        } else {
//            return redirect()->route('login');
//        }

        if (\Auth::user()->role()->first()->name == 'superadmin') {
            return $next($request);
        } else {
            abort(403, 'У вас нет прав доступа для этой страницы');
        }
    }
}

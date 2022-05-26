<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
  
        switch ($guard) {
            case 'admin':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('admin.dashboard');
              }
             
            default:
              if (Auth::guard($guard)->check()) {
                  return redirect('/');
              }
              break;
          }
          return $next($request);

    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isSa
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
        if(Auth()->user()->level !== 'System Analyst' && Auth()->user()->level !== 'Admin' && Auth()->user()->level !== 'Techical Writing')
        {
            abort(403);
        }

        return $next($request);
    }
}

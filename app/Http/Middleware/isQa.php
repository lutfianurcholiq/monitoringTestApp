<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isQa
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
        
        if(Auth()->user()->level !== 'Quality Assurance' && Auth()->user()->level !== 'Technical Writing' && Auth()->user()->level !== 'System Analyst' && Auth()->user()->level !== 'Admin')
        {
            abort(403);
        }

        return $next($request);
    }
}

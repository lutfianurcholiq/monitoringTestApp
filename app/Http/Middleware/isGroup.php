<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;

class isGroup
{

    private Group $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(auth()->user()->group_id == $this->group->id)
        {
            abort(403);
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware\User;

use Auth;
use Closure;
use App\Models\User\User;

class UserIdentityCheck
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
        if ( ! Auth::user()->credentials()->where('doc_approved', 1)->count() == 2) {
            return redirect()->route('user.dashboard')->with('message', 'User Not Identified to Perform Such Transaction.');
        }

        return $next($request);
    }
}

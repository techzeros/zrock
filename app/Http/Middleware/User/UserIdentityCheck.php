<?php

namespace App\Http\Middleware\User;

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
        dd(\Auth::user()->credentials);
        // $user = \Auth::user();

        // dd($user->credentials);

        return $next($request);
    }
}

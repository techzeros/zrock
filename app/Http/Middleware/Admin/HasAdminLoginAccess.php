<?php

namespace App\Http\Middleware\Admin;

use Auth;
use Closure;
use App\Models\Admin\Admin;
use Carbon\Carbon as Carbon;
use App\Models\Admin\AdminLoginRequest;

class HasAdminLoginAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        // Redirect to dashboard if authenticated
        if (Auth::guard($guard)->check()) {
            return redirect(route('admin.dashboard'));
        }

        // Check if the url is from admin/login and the http verb for the request is GET
        if ($request->route()->named('admin.login') && $request->isMethod('get')) {

            // Get the email and token query string values
            $email = $request->route('email');
            $token = $request->route('token');

            // Get admin using email
            $admin = Admin::where(['email' => $email])->first();

            // Check if the admin exists, then carry out some actioins
            if ($admin != null) {
                // Get the admin login request that matches the admin id and login token
                $loginRequest = AdminLoginRequest::where(['admin_id' => $admin->id, 'login_token' => $token])->first();

                // Check if the admin has a login request
                if ($loginRequest != null) {
                    // Create a carbon datetime instance from the login request create_at
                    $date_created =  Carbon::parse($loginRequest->created_at);

                    // Get time now
                    $now = Carbon::now();

                    // Check if the login request has expired (passed 30minutes)
                    if ($now->diffInMinutes($date_created) > 30) {
                        // If token has expired, delete all admin related token and redirect back to login request page
                        AdminLoginRequest::where(['admin_id' => $admin->id])->delete();
                        return redirect()->route('admin.login.request')->with('error', 'Token has expired. Apply again.');
                    }

                    return $next($request);                     
                }

                return redirect()->route('admin.login.request')->with('error', 'Invalid Login Request.');
            }

            return redirect()->route('admin.login.request')->with('error', 'Invalid admin details supplied.');
        } 
        
        return redirect()->route('admin.login.request')->with('error', 'Action not allowed.');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        // Defining our middleware for this controller
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    // Function to show admin login form
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    // Function to login admins
    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'pin' => 'required|min:4',
        ]);

        // Attempt to login the admins in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'pin' => $request->pin], $request->remember)) {
            // If successful redirect to admin dashboard
            return redirect()->intended(route('admin.dashboard'));
        }

        // If unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    // Logout Function
    public function logout()
    {
        // Logout Admin and Redirect to Home Page
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}

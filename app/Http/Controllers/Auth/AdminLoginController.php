<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Notification;
use Illuminate\Http\Request;
use App\Events\UserLoggedIn;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Notifications\UserLoggedInNotification;

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'pin' => 'required|min:4',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    // Function to login admins
    public function login(Request $request)
    {
        // Validate the form data
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->only('email', 'remember'));
        }

        // Attempt to login the admins in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'pin' => $request->pin], $request->remember)) {
            
            // Trigger UserLoggedIn Event
            $this->authenticated();

            // If successful redirect to admin dashboard
            return redirect()->intended(route('admin.dashboard'));
        }

        // If unsuccessfull redirect back to the login for with form data
        $request->session()->flash('loginFailed', 'Incorrect Login Details!');
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /**
     * The user has been authenticated.
     *
     * @return mixed
     */
    protected function authenticated()
    {
        $user = Auth::guard('admin')->user();
        $user_type = 'admin';
        
        // Send User Logged In Notification
        Notification::send($user, new UserLoggedInNotification($user));

        // On login Success Fire the Login Activiy Event
        event(new UserLoggedIn($user, $user_type));
    }

    // Logout Function
    public function logout()
    {
        // Logout Admin and Redirect to Home Page
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}

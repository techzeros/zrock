<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Mail;
use Notification;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Events\UserLoggedIn;
use App\Mail\AdminLoginRequestPin;
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

    // Show Login Pin Generation Request
    public function showLoginRequestForm()
    {
        return view('auth.admin-login-request-pin');
    }

    // Function to handle Admin Login Request
    public function requestLoginPin(Request $request)
    {
        $email = $request->input('email');
        $login_request_code = $request->input('login_request_code');
        $admin = Admin::where(['email' => $email, 'login_request_code' => $login_request_code])->first();

        if ($admin != null) {

            // Generate PIN
            $pin = random_int(1111, 9999);
            
            // Update the Admin Pin
            $admin->pin = $pin;
            $admin->allow_login = 1;
            $admin->save();
            
            // Email the User Verification Token on Successful Registration
            $email = new AdminLoginRequestPin($admin);
            
            // Send User Activation Link
            Mail::to($admin->email)->send($email);

            \Session::flash('message', 'Login Request Authorization Details has been emailed to you!');
            return redirect()->route('admin.login');
        }

        return redirect()->back()->withInput()->with('error', 'Invalid Login Request Details!');
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
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'pin' => $request->pin, 'allow_login' => 1], $request->remember)) {
            
            // Trigger UserLoggedIn Event
            $this->authenticated();

            // If successful redirect to admin dashboard
            // return redirect()->intended(route('admin.dashboard'));
            return redirect()->route('admin.dashboard');
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
        
        // Reset Admin PIN
        $user->pin = null;
        $user->allow_login = null;
        $user->save();

        // Send User Logged In Notification
        Notification::send($user, new UserLoggedInNotification($user));

        // On login Success Fire the Login Activiy Event
        event(new UserLoggedIn($user, $user_type));
    }

    // Logout Function
    public function logout()
    {
        // Logout Admin
        Auth::guard('admin')->logout();

        // Set Flash Message and redirect to Login Page
        \Session::flash('message', 'You have successfully logged out!');
        return redirect()->route('admin.login');
    }
}

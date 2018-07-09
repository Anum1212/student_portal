<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
Use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //function to login admins
    public function login(Request $request)
    {
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        //attempt to login the admins in
        //if successful redirect to admin dashboard
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'userType' => '0'])) {
            return redirect()->intended(route('superAdmin.dashboard'));
        }
        //if successful redirect to department admin dashboard
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'userType' => '1'])) {
            return redirect()->intended(route('departmentAdmin.dashboard'));
        }
        //if successful redirect to society admin dashboard
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'userType' => '2'])) {
            return redirect()->intended(route('societyAdmin.dashboard'));
        }
        //if successful redirect to student dashboard
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'userType' => '3'])) {
            return redirect()->intended(route('student.dashboard'));
        }
        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('status', 'Could not log you in, please check your credentials.');
    }
}

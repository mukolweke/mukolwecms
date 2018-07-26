<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
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
    protected $redirectTo = 'admin/home_admin';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin,home_admin')->except('logout');
    }


    public function redirectTo()
    {
        $validator = '';
        return view('admin.home_admin', compact('validator'));
    }


    protected function guard()
    {
        return \Auth::guard('admin');
    }


    public function showLoginForm()
    {
        $validator ='';

        return view('auth.admin_login', compact('validator'));
    }

    public function login(Request $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');

        // Check if user is using email or username
        $field = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $field => $email,
            'password' => $password,
        ];


        $user = Admin::where('email', $email)->first();

        if ($user === null) {
            $validator = "Your [Username/Email] and/or Password is incorrect!";

            return view('auth.admin_login', compact('validator'));
        }

        if (Admin::where('email',$email)->exists()) {
            \Session::flash('success', 'Successfully logged in!');

            return view('admin.home_admin');
        }

    }

}




//        // check if user is authentic
//        if (auth()->attempt($credentials)) {
//            // check if email has been verified
//            if (!auth()->user()->verified()) {
//                auth()->logout();
//                session()->flash('error', 'You must verify your email before you can access the site. ' .
//                    '<br>If you have not received the confirmation email check your spam folder. ' .
//                    '<b><a class="alert-link" href="' . route('resend.email') . '" class="alert-link">Click here</a></b> for the option to resend.');
//                return redirect()->route('home');
//            }
//            //event(new UserHasLoggedIn(auth()->user()));
//            session()->flash('success', 'Successfully logged in!');
//            return redirect()->intended(route('home'));
//        }
//        session()->flash('error', 'Your [Username/Email] and/or Password is incorrect!');
//        return redirect()->back()->withInput();
<?php

namespace App\Http\Controllers\Auth;

use App\FinancialAdvisor;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdvisorLoginController extends Controller
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
    protected $redirectTo = '/login';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:advisor,advisor/home')->except('logout');
    }


    public function redirectTo()
    {
        return 'home_advisor';
    }


    protected function guard()
    {
        return \Auth::guard('advisor');
    }


    public function showLoginForm()
    {
        return view('auth.advisor_login');
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

        $passwd = (FinancialAdvisor::where('email', $email)->first()->password);

        if(Hash::check($password, $passwd))
        {
            return view('advisor.home_advisor');

        }else{

            return view('auth.advisor_login');

        }

    }

}

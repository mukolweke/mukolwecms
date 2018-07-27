<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class ClientLoginController extends Controller
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
        $this->middleware('guest:admin,admin/home')->except('logout');
    }


    public function redirectTo()
    {
        return 'home_client';
    }


    protected function guard()
    {
        return \Auth::guard('admin');
    }


    public function showLoginForm()
    {
        return view('auth.client_login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');


        $account_details = Client::where('email', $email)->first();

        return view('clients.home_client');


//        if(($account_details->account_status) == 0)
//        {
//            // redirect to verification
//            $data = [
//                'account_details' => $account_details,
//                'err'=> '',
//            ];
//            return view('auth.not_activated_view', compact('data'));
//
//        }else{
//
//            // Check if user is using email or username
//            $field = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
//
//            $credentials = [
//                $field => $email,
//                'password' => $password,
//            ];
//
//            $passwd = (FinancialAdvisor::where('email', $email)->first()->password);
//
//            if(Hash::check($password, $passwd))
//            {
//                $all_clients = Client::all();
//
//                return view('advisor.home_advisor', compact('all_clients'));
//
//            }else{
//
//                return view('auth.advisor_login');
//
//            }
//
//        }
    }

}

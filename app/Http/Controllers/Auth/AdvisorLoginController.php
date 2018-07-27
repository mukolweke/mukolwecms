<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Client;
use App\FinancialAdvisor;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\FARepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdvisorLoginController extends Controller
{

    protected $repository;


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
    public function __construct(FARepository $repository)
    {
        $this->repository = $repository;

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

        $user = FinancialAdvisor::where('email', $email)->first();

        if ($user === null) {
            return view('auth.advisor_login');
        }

        $account_details = $this->repository->getAdvisorDetails($email);

        if(($account_details->account_status) == 0)
        {
            // redirect to verification
            $data = [
                'account_details' => $account_details,
                'err'=> '',
            ];
            return view('auth.not_activated_view', compact('data'));

        }else{

            // Check if user is using email or username
            $field = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            $credentials = [
                $field => $email,
                'password' => $password,
            ];

            $passwd = $this->repository->getAdvisorDetails($email)->password;

            if(Hash::check($password, $passwd))
            {
                $all_clients = Client::all();

                $this->setSession($request,$email);

                return view('advisor.home_advisor', compact('all_clients'));

            }else{

                return view('auth.advisor_login');

            }

        }
    }


    public function verify(Request $request)
    {
        $activation_code = $request->input('activation_code');
        $email = $request->input('email');


        $account_details = $this->repository->getAdvisorDetails($email);;

        if(($account_details->activation_code)==$activation_code){
            // redirect to home page

            $account = FinancialAdvisor::findOrFail($account_details->id)
                ->update(['account_status' => 1]);

            $this->setSession($request,$email);

            $all_clients = Client::all();;

            return view('advisor.home_advisor', compact('all_clients'));
        }else{
            // update account status and redirect back home page

            $data = [
                'account_details' => $account_details,
                'err'=> 'Wrong Activation Code',
            ];

            return view('auth.not_activated_view', compact('data'));
        }

    }


    public function setSession($request, $email){

        $user_id = $this->repository->getAdvisorDetails($email)->id;
        $name = $this->repository->getAdvisorDetails($email);

        $request->session()->put('user_id',$user_id );
        $request->session()->put('email', $email);
        $request->session()->put('payload', $name);
    }

}

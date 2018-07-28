<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Client;
use App\FinancialAdvisor;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\FARepository;
use App\Repositories\Advisor\ClientWebRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdvisorLoginController extends Controller
{

    protected $repository, $repositoryweb;


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
    public function __construct(FARepository $repository, ClientWebRepository $repositoryweb)
    {
        $this->repository = $repository;

        $this->repositoryweb = $repositoryweb;

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

        $user = $this->repository->getAdvisorDetails($email);

        if ($user === null) {
            return view('auth.advisor_login');
        }

        if (($user->account_status) == 0) {
            // redirect to verification
            $data = [
                'account_details' => $user,
                'err' => '',
            ];
            return view('auth.not_activated_advisor_view', compact('data'));

        } else {

            $passwd = $this->repository->getAdvisorDetails($email)->password;

            if (Hash::check($password, $passwd)) {
                $request->session()->flush();

                $this->setSession($request, $user);

                $data = $this->getData();

                return view('advisor.home_advisor', compact('data'));

            } else {

                return view('auth.advisor_login');

            }

        }
    }


    public function verify(Request $request)
    {
        $activation_code = $request->input('activation_code');
        $email = $request->input('email');


        $account_details = $this->repository->getAdvisorDetails($email);;

        if (($account_details->activation_code) == $activation_code) {
            // redirect to home page

            $account = $this->repository->updateStatusAcc($account_details);

            $this->setSession($request, $account_details);

            $data = $this->getData();

            return view('advisor.home_advisor', compact('data'));
        } else {
            // update account status and redirect back home page
            $data = [
                'account_details' => $account_details,
                'err' => 'Wrong Activation Code',
            ];

            return view('auth.not_activated_advisor_view', compact('data'));
        }

    }


    public function setSession($request, $account_details)
    {
        $request->session()->put('user_id', $account_details->id);
        $request->session()->put('email', $account_details->email);
        $request->session()->put('payload', $account_details);
    }


    public function getData()
    {
        $data = [
            'all_clients' => $this->repositoryweb->getAllClients(),

            'my_clients' => $this->repositoryweb->getAllMyClients(session()->get('user_id')),
        ];

        return $data;
    }

}

<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use App\Http\Controllers\Controller;
use App\Repositories\Client\ClientRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientLoginController extends Controller
{
    protected $repository;
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
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;

        $this->middleware('guest:advisor,advisor/home')->except('logout');
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

        $user = $this->repository->getUser($email);

        if ($user === null) {
            return view('auth.client_login');
        }

        if (($user->account_status) == 0) {
            // redirect to verification
            $data = [
                'account_details' => $user,
                'err' => '',
            ];
            return view('auth.not_activated_client_view', compact('data'));

        } else {
            $passwd = $this->repository->getUser($email)->password;

            if (Hash::check($password, $passwd)) {
                $request->session()->flush();

                $this->setSession($request, $user);

                $data = $this->getData($user);

                return view('clients.home_client', compact('data'));

            } else {

                return view('auth.client_login');

            }

        }

    }

    public function verify(Request $request)
    {
        $activation_code = $request->input('activation_code');
        $email = $request->input('email');


        $account_details = $this->repository->getUser($email);;

        if (($account_details->activation_code) == $activation_code) {
            // redirect to home page

            $account = $this->repository->updateStatusAcc($account_details);

            $request->session()->flush();

            $this->setSession($request, $account_details);

            $data = $this->getData($account_details);

            return view('clients.home_client', compact('data'));
        } else {
            // update account status and redirect back home page
            $data = [
                'account_details' => $account_details,
                'err' => 'Wrong Activation Code',
            ];

            return view('auth.not_activated_client_view', compact('data'));
        }

    }


    public function setSession($request, $account_details)
    {
        $request->session()->put('user_id', $account_details->id);
        $request->session()->put('email', $account_details->email);
        $request->session()->put('payload', $account_details);
    }


    public function getData($account_details)
    {
        $data = [
            'my_details' => $this->repository->getUser($account_details->email),

            'my_fa' => $this->repository->getMyFa($account_details->id),
        ];

        return $data;
    }

}

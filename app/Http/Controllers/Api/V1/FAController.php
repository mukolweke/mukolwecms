<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\FinancialAdvisorWasCreated;
use App\FinancialAdvisor;
use App\Repositories\Admin\FARepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Event;

class FAController extends Controller
{

    protected $fa_repo;

    public function __construct(FARepository $fa_repo)
    {
        $this->fa_repo = $fa_repo;
    }

    public function index()
    {
        return $this->fa_repo->getAllAdvisors();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $validator = $this->validate($request, [
            'email' => 'unique:financial_advisors|max:255',
        ]);

        $request_data = [
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'password' => bcrypt(request('password')),
            'fa_rank' => request('rank'),
            'activation_code' => request('activation_code'),
        ];

        $financial_advisor = FinancialAdvisor::create($request_data);

//        // call an event to send the email
//        $event = new FinancialAdvisorWasCreated($financial_advisor);
//
//        Event::fire($event);

        return $financial_advisor;
    }


    public function show($id)
    {
        return FinancialAdvisor::findOrFail($id)->paginate(5);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $financial_advisor = FinancialAdvisor::findOrFail($id)
            ->update($request->all());

        return $financial_advisor;
    }

    public function destroy($id)
    {
        $financial_advisor = FinancialAdvisor::findOrFail($id)
            ->delete();
        return '';
    }
}

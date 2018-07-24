<?php

namespace App\Http\Controllers\Api\V1;

use App\FinancialAdvisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FAController extends Controller
{
    public function index()
    {
        return FinancialAdvisor::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'unique:FinancialAdvisor|max:255',
        ]);

        $request_data = [
          'name'=>request('name'),
          'email'=>request('email'),
          'phone'=>request('phone'),
          'password'=>bcrypt(request('password')),
          'fa_rank'=>request('rank'),
        ];

        $financial_advisor = FinancialAdvisor::create($request_data);

        // call an event to send the email

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

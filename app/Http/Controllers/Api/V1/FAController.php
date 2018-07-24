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
        $financial_advisor = FinancialAdvisor::create($request->all());
        return $financial_advisor;
    }


    public function show($id)
    {
        return FinancialAdvisor::findOrFail($id);
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
        $financial_advisor = Company::findOrFail($id)
            ->delete();
        return '';
    }
}

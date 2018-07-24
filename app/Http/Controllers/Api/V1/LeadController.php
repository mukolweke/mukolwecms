<?php

namespace App\Http\Controllers\Api\V1;

use App\Lead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeadController extends Controller
{
    public function index()
    {
        return Lead::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $lead = Lead::create($request->all());

        // call an event to send the email

        return $lead;
    }
    public function show($id)
    {
        return Lead::findOrFail($id);
    }

    public function edit(Lead $lead)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $lead = Lead::findOrFail($id)
            ->update($request->all());

        return $lead;
    }

    public function destroy($id)
    {
        $financial_advisor = Lead::findOrFail($id)
            ->delete();
        return '';
    }
}

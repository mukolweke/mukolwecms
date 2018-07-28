<?php
/**
 * Created by PhpStorm.
 * User: molukaka
 * Date: 27/07/2018
 * Time: 10:55
 */

namespace App\Repositories\Advisor;


use App\Client;
use App\Investment;

class ClientWebRepository
{
    protected $deal_status = 0;
    // get all clients
    public function getAllClients()
    {
        return Client::with('financialAdvisor')->get()->map(function ($client){
            return[
                'id' => $client->id,
                'name' => $client->name,
                'email' => $client->email,
                'phone' => $client->phone,
                'project' => $client->project,
                'investment' => $client->investment,
                'advisor' => $client->financialAdvisor->name,
                'created_at' => $client->created_at->toFormattedDateString(),
            ];
        });
    }

    // get my clients
    public function getAllMyClients($id)
    {
        return Client::where('advisor_id',$id)->get();
    }

    // create advisor
    public function createClient($request_data)
    {

        if(request('project') != null && request('investment') != null){
            $this->deal_status = 1;
        }
        $client_data = [
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'password' => bcrypt(request('password')),
            'advisor_id'=> request('advisor_id'),
            'deal_status' => $this->deal_status,
            'activation_code' => request('activation_code'),
            'deleted_at'=> date("Y-m-d",strtotime(time()))
        ];

        Client::create($client_data);

        $invest_data = [
            'client_id'=> Client::latest()->first()->id,
            'project' => request('project'),
            'investment' => request('investment'),

        ];


        Investment::create($invest_data);

        return true;
    }

    public function getClientDetails($id)
    {
        return Client::where('id',$id)->get();
    }

    // update deal status
    public function updateDeal($request)
    {
        $request = [
            'client_id' => request('client_id'),
            'project' => request('project'),
            'investment' => request('investment'),
            ];

        Client::findOrFail($request['client_id'])
            ->update(['deal_status'=>1]);

        // create investment
        Investment::create($request);

        return response()->json(['success' => true]);
    }

    // investor makes new deal
    public function newInvestmentDeal($request)
    {
        return Investment::create($request->all());
    }

}
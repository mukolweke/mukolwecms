<?php
/**
 * Created by PhpStorm.
 * User: molukaka
 * Date: 27/07/2018
 * Time: 10:55
 */

namespace App\Repositories\Advisor;


use App\Client;

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
        $request_data = [
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'password' => bcrypt(request('password')),
            'advisor_id'=> request('advisor_id'),
            'project' => request('project'),
            'deal_status' => $this->deal_status,
            'investment' => request('investment'),
            'activation_code' => request('activation_code'),
            'deleted_at'=> date("Y-m-d",strtotime(time()))
        ];

        return Client::create($request_data);
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

        $client_to_update = Client::findOrFail($request['client_id'])
            ->update(['deal_status'=>1,'project'=>$request['project'],'investment'=>$request['investment']]);

        return response()->json(['success' => true]);
    }

}
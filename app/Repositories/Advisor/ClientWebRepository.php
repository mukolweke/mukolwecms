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
        $request_data = [
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'password' => bcrypt(request('password')),
            'advisor_id'=> request('advisor_id'),
            'project' => request('project'),
            'investment' => request('investment'),
            'activation_code' => request('activation_code'),
            'deleted_at'=> date("Y-m-d",strtotime(time()))
        ];

        return Client::create($request_data);
    }

    public function getClientDetails($id)
    {
//        dd(Client::where('id',$id)->get());
        return Client::where('id',$id)->get();
    }

}
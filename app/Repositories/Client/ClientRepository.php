<?php
/**
 * Created by PhpStorm.
 * User: molukaka
 * Date: 28/07/2018
 * Time: 16:43
 */

namespace App\Repositories\Client;


use App\Client;
use App\FinancialAdvisor;

class ClientRepository
{
    // get user
    public function getUser($email)
    {
        return Client::where('email', $email)->first();
    }

    // update acccount status
    public function updateStatusAcc($account_details)
    {
        return Client::findOrFail($account_details->id)
            ->update(['account_status' => 1]);
    }

    // get my financial advisor details
    public function getMyFa($id)
    {
//      dd(Client::find($id)->financialAdvisor->name);

//        return FinancialAdvisor::find(Client::where('advisor_id',$id)->get()->id);
    }
}
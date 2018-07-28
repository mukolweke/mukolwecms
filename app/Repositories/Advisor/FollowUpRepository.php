<?php
/**
 * Created by PhpStorm.
 * User: molukaka
 * Date: 28/07/2018
 * Time: 12:48
 */

namespace App\Repositories\Advisor;

use App\Client;
use App\FollowUp;
use App\Notification;
use Illuminate\Http\Request;

class FollowUpRepository
{
    // get all
    public function getAllNotifications()
    {
        return Notification::all();
    }

    // create schedule
    public function createSchedule(Request $request)
    {
        $followUp = new Notification();
        $followUp->followup_name = $request['follow_up_name'];
        $followUp->client_id = $request['client_id'];
        $followUp->advisor_id = session()->get('user_id');
        $followUp->start_date = $request['start_date'];
        $followUp->end_date = $request['end_date'];
        $followUp->save();

    }

    // get clients who havent made deals yet
    public function getPotentialClients()
    {
        return Client::where(['deal_status'=>0,'advisor_id'=>session()->get('user_id')])->get();
    }

    // get all my follow ups
    public function getAllMyFollowUps($id)
    {
        return FollowUp::find($id)->orderBy('created_at', 'desc')->get();
    }

}
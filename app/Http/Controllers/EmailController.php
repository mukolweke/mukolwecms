<?php

namespace App\Http\Controllers;

use App\Client;
use App\FinancialAdvisor;
use App\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    // email sent when a new advisor is created
    public function sendConfirmEmail(Request $request)
    {

    $activation_code = $request->input('activation_code');
    $email = $request->input('email');



    Mail::send('mail.NewFA', ['title' => "Confirm Account", 'activation_code' => $activation_code ,'email'=>$email], function ($message)
        {

            $message->from('molukaka@cytonn.com', 'Michael Olukaka');

            $message->to('mukolwecms-326739@inbox.mailtrap.io');

        });


        return back();
    }

    // email sent when the advisor is assigned a lead
    public function sendNewAssignedLead(Request $request)
    {

        $data = [
        'advisor_details' => FinancialAdvisor::find($request->input('advisor_id')),

        'lead_details' => Lead::orderBy('created_at', 'desc')->first()
        ];


        Mail::send('mail.AssignLead', ['title' => "Confirm Account", 'data' => $data], function ($message)
        {

            $message->from('molukaka@cytonn.com', 'Michael Olukaka');

            $message->to('mukolwecms-326739@inbox.mailtrap.io');

        });


        return back();
    }

    // email sent when advisor creates their link
    public function sendCreatedMyLead($request)
    {

        $data = [
        'advisor_details' => FinancialAdvisor::find($request->input('advisor_id')),

        'lead_details' => Lead::orderBy('created_at', 'desc')->first()
        ];


        Mail::send('mail.CreatedMyLead', ['title' => "Confirm Account", 'data' => $data], function ($message)
        {

            $message->from('molukaka@cytonn.com', 'Michael Olukaka');

            $message->to('mukolwecms-326739@inbox.mailtrap.io');

        });


        return back();
    }

    // email sent when client account is created
    public function sendClientConfirmEmail(Request $request)
    {

        $activation_code = $request->input('activation_code');
        $email = $request->input('email');


        Mail::send('mail.NewClient', ['title' => "Confirm Account", 'activation_code' => $activation_code ,'email'=>$email], function ($message)
        {

            $message->from('molukaka@cytonn.com', 'Michael Olukaka');

            $message->to('mukolwecms-326739@inbox.mailtrap.io');

        });


        return back();
    }

    // email sent when client makes a deal i
    public function sendMadeDeal(Request $request)
    {

        $client_details = Client::find($request->input('client_id'));


        Mail::send('mail.DealMade', ['title' => "Confirm Account", 'client_details'=> $client_details], function ($message)
        {

            $message->from('molukaka@cytonn.com', 'Michael Olukaka');

            $message->to('mukolwecms-326739@inbox.mailtrap.io');

        });


        return back();
    }

    // email sent when client makes a deal i
    public function sendNewDeal(Request $request)
    {

        $client_details = Client::find($request->input('client_id'));


        Mail::send('mail.NewDealMade', ['title' => "Confirm Account", 'client_details'=> $client_details], function ($message)
        {

            $message->from('molukaka@cytonn.com', 'Michael Olukaka');

            $message->to('mukolwecms-326739@inbox.mailtrap.io');

        });


        return back();
    }
}
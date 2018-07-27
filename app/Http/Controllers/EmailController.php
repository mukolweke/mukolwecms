<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    public function send(Request $request)
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
}
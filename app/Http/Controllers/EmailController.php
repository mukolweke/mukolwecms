<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    public function send(Request $request)
    {


        Mail::send('mails.send', ['title' => "New FA", 'body' => "You Have been added as an FA"], function ($message)
        {

            $message->from('molukaka@cytonn.com', 'Michael Olukaka');

            $message->to('mukolwecms-326739@inbox.mailtrap.io');

        });


        return view('admin.index', ['success' => 'Email Sent']);


    }
}
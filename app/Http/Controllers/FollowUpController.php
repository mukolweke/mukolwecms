<?php

namespace App\Http\Controllers;

use App\FollowUp;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use MaddHatter\LaravelFullcalendar\Calendar;

class FollowUpController extends Controller
{

    public function index()
    {
        $followups =  FollowUp::all();
        $followupsList = [];
        foreach ($followups as $key=>$followup){
            $followupsList = Calendar::event(
                $followup->name,
                true,
                new \DateTime($followup->start_date),
                new \DateTime($followup->end_date.'+1 day')
            );
        }
//        dd($followupsList);

        $calendar_details = \Calendar::addEvents($followupsList);

        return view('advisor.create_followup_schedule', compact('calendar_details'));
    }

    public function addSchedule(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        if($validator->fails())
        {
            \Session::flash('warning', 'Please enter the valid details');
            return Redirect::to('/view_schedule_index')->withInput()->withErrors($validator);
        }

        $followUp = new FollowUp();
        $followUp->name = $request['name'];
        $followUp->start_date = $request['start_date'];
        $followUp->end_date = $request['end_date'];
        $followUp->save();

        \Session::flash('success', 'Follow-up schedule created');
        return Redirect::to('/view_schedule_index');

    }

}

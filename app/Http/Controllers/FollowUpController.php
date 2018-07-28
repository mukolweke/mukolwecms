<?php

namespace App\Http\Controllers;

use App\Client;
use App\FollowUp;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Repositories\Advisor\FollowUpRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class FollowUpController extends Controller
{

    protected $follow_repo;

    public function __construct(FollowUpRepository $follow_repo)
    {
        $this->follow_repo = $follow_repo;
    }

    public function index()
    {
        $followups = $this->follow_repo->getAllNotifications();
        $followupsList = [];
        foreach ($followups as $key => $followup) {
            $followupsList[] = Calendar::event(
                $followup->followup_name.' to '.Client::find($followup->client_id)->name,
                true,
                new \DateTime($followup->start_date),
                new \DateTime($followup->end_date . ' +1 day')
            );
        }

        $data = ['calendar_details' => Calendar::addEvents($followupsList),

        'potential_clients' => $this->follow_repo->getPotentialClients(),
            ];

        return view('advisor.create_followup_schedule', compact('data'));
    }

    public function addSchedule(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'follow_up_name' => 'required',
            'client_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        if ($validator->fails()) {
            \Session::flash('warning', 'Please enter the valid details');
            return Redirect::to('/view_schedule_index')->withInput()->withErrors($validator);
        }

        $this->follow_repo->createSchedule($request);

        \Session::flash('success', 'Follow-up schedule created');
        return Redirect::to('/view_schedule_index');

    }


    // advisor view followups page
    public function viewFollowUps()
    {
        $data = [

            'all_followups' => $this->follow_repo->getAllNotifications(),

            'all__potential_clients' => $this->follow_repo->getPotentialClients(),
        ];

        return view('advisor.track_followups', compact('data'));
    }


    // save details in database
    public function saveFollowUps(Request $request)
    {
        $followup = $request->input('followup');
        $client_id = $request->input('client_id');
        $feedback = $request->input('feedback');

        FollowUp::create($request->all());

        return back();

    }

}

<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\EmailController;
use App\Lead;
use App\Repositories\Admin\LeadRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeadController extends Controller
{

    protected $lead_repo;
    protected $mail;

    public function __construct(LeadRepository $lead_repo, EmailController $mail)
    {
        $this->lead_repo = $lead_repo;
        $this->mail = $mail;
    }


    public function index()
    {
        return $this->lead_repo->getAll();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $lead = $this->lead_repo->createLead($request);

        // call an event to send the email
        $this->mail->sendNewAssignedLead($request);

        return $lead;
    }

    public function advisor_store(Request $request)
    {
        $lead = $this->lead_repo->createLead($request);

        // call an event to send the email
        $this->mail->sendNewAssignedLead($request);

        return back();
    }

    public function show($id)
    {
        return $this->lead_repo->getLead($id);
    }

    public function edit(Lead $lead)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $lead = $this->lead_repo->updateLead($request, $id);

        return response()->json(['success' => true]);;
    }

    public function destroy($id)
    {
        $this->lead_repo->deleteLead($id);

        return '';
    }
}

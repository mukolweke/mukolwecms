<?php

namespace App\Http\Controllers;

use App\Client;
use App\Repositories\Admin\FARepository;
use App\Repositories\Admin\LeadRepository;
use App\Repositories\Advisor\ClientWebRepository;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    protected $clientWebRepository,$FARepository,$lead_repo, $mail;

    public function __construct(ClientWebRepository $clientWebRepository, FARepository $FARepository, LeadRepository $lead_repo, EmailController $mail)
    {
        $this->clientWebRepository = $clientWebRepository;
        $this->FARepository = $FARepository;
        $this->lead_repo = $lead_repo;
        $this->mail = $mail;
    }

    // admin view fa index
    public function viewAdvisor()
    {
        return view('admin.viewAdvisors');
    }

    // admin view clients index
    public function viewClients()
    {
        return view('admin.viewClients');
    }

    // admin vew leads index
    public function viewLeads()
    {
        return view('admin.viewLeads');
    }

    public function adminDash()
    {
        return view('admin.home_admin');
    }

    // advisor index page
    public function advisorDash()
    {
        $all_clients = $this->clientWebRepository->getAllClients();

        return view('advisor.home_advisor', compact('all_clients'));
    }

    // advisor view their clients page
    public function advisorViewClient()
    {
        $all_clients = $this->clientWebRepository->getAllMyClients(session()->get('user_id'));

        return view('advisor.view_create_clients', compact('all_clients'));
    }

    // client dashboard
    public function clientDash()
    {
        return view('clients.home_client');
    }

    // profile page
    public function viewProfile($id)
    {
        $client_details = $this->clientWebRepository->getClientDetails($id);

        return view('advisor.view_profile', compact('client_details'));
    }

    // leads page advisor
    public function viewAdvisorLeads()
    {
        $all_leads = $this->FARepository->getMyLeads(session()->get('user_id'));

        return view('advisor.view_create_leads', compact('all_leads'));
    }

    // post leads for advisor
    public function advisor_store(Request $request)
    {
        $lead = $this->lead_repo->createLead($request);

        // call an event to send the email
        $this->mail->sendCreatedMyLead($request);

        session()->put('success','Lead created');

        return back();
    }

}
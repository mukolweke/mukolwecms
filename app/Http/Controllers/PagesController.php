<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class PagesController extends Controller
{
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
        $all_clients = Client::all();

        return view('advisor.home_advisor', compact('all_clients'));
    }

    // advisor view their clients page
    public function advisorViewClient()
    {
        return view('advisor.view_create_clients');
    }

    // client dashboard
    public function clientDash()
    {
        return view('clients.home_client');
    }

}
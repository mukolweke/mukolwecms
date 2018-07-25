<?php

namespace App\Http\Controllers;

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

}
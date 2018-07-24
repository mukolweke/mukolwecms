<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // admin view fa index
    public function adminIndex()
    {
        return view('admin.index');
    }

    // admin view clients index
    public function viewClients()
    {
        return view('admin.viewClients');
    }
}
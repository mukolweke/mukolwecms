<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index_admin()
    {
        return view('admin.home_admin');
    }

    public function index_advisor()
    {
        return view('advisor.home_advisor');
    }
}

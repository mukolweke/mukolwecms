<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // admin index
    public function adminIndex()
    {
        return view('admin.index');
    }
}
<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;

class Admin extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password'];


    public function getAdmin()
    {
        return Admin::all();
    }

}
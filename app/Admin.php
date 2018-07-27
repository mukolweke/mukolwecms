<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Admin extends Model
{
    use Authenticatable;

    protected $fillable = ['name', 'email', 'password'];


    public function getAdmin()
    {
        return Admin::all();
    }

//    protected $hidden = [
//        'password', 'remember_token',
//    ];

}
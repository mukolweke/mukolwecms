<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: molukaka
 * Date: 26/07/2018
 * Time: 10:48
 */

class AdvisorModel extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'password', 'account_status', 'fa_rank'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
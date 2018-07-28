<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class FinancialAdvisor extends Model
{
    use Authenticatable;

    protected $table ='financial_advisors';

    protected $fillable = ['name', 'email', 'phone', 'password', 'account_status','activation_code','fa_rank'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function client()
    {
        return $this->hasMany('App\Client');
    }

    public function lead()
    {
        return $this->hasMany('App\Lead');

    }

    public function followup()
    {
        return $this->hasMany('App\FollowUp');

    }

    public function notification()
    {
        return $this->hasMany('App\Notification');
    }
}

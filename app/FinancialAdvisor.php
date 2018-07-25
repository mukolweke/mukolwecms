<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class FinancialAdvisor extends Authenticatable
{
    protected $fillable = ['name', 'email', 'phone', 'password', 'account_status', 'fa_rank'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialAdvisor extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'password', 'account_status', 'fa_rank'];
}

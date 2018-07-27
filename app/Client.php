<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Client extends Model
{
    use Authenticatable;

    protected $fillable = ['name', 'email', 'phone', 'password', 'account_status'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Table name
    protected $table = 'clients';

    public function financialAdvisor()
    {
        return $this->belongsTo('App\FinancialAdvisor');
    }
}

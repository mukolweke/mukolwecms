<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    protected $fillable = [
        'name', 'start_date', 'end_date',
    ];

    public function financialAdvisor()
    {
        return $this->belongsTo('App\FinancialAdvisor');
    }
}

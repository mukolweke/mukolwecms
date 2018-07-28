<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    protected $fillable = [
        'name', 'advisor_id','client_id', 'deal_status', 'feedback'
    ];

    public function financialAdvisor()
    {
        return $this->belongsTo('App\FinancialAdvisor');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['followup_name','client_id','advisor_id','start_date', 'end_date'];

    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function advisor()
    {
        return $this->belongsTo('App\FinancialAdvisor', 'advisor_id');
    }
}

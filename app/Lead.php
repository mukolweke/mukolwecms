<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['name', 'source', 'description','advisor_id'];

    public function financialAdvisor()
    {
        return $this->belongsTo('App\FinancialAdvisor','advisor_id');
    }

}

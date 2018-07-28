<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $fillable = ['client_id', 'project', 'investment'];

    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }
}

<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'state';
    protected $fillable = [
        'id',
        'name',
        'countryId',
        'stateCode',
        
    ];

    public function country()
    {
        return $this->belongsTo('App\Entity\Country', 'countryId');
    }

    public function cities()
    {
        return $this->hasMany('App\Entity\City', 'stateId');
    }
}

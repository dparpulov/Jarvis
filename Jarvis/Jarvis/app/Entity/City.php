<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $fillable = [
        'id',
        'countryId',
        'stateId',
        'name',
        'alternativeName',
        'lng',
        'lat',
        'description',
        'inhabitants',
    
    ];

    public function country()
    {
        return $this->belongsTo('App\Entity\Country', 'countryId');
    }

    public function state()
    {
        return $this->belongsTo('App\Entity\State', 'stateId');
    }
}

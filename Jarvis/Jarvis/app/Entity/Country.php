<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    protected $fillable = [
        'id',
        'spId',
        'name',
        'continent',
        'currencyCode',
        'currencyName',
        'geonameId',
        'description',
        'languages',
    
    ];
    //public $timestamps = false;
    public $incrementing = false;

    public function states()
    {
        return $this->hasMany('App\Entity\State', 'countryId');
    }

    public function cities()
    {
        return $this->hasMany('App\Entity\City', 'countryId');
    }
}

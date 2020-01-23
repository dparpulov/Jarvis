<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class TestProvider extends Model
{
    protected $table = 'test_provider';

    protected $fillable = [
        'id',
        'name',
        'promote',    
    ];

    public function baseTestCenter()
    {
        return $this->hasMany('App\Entity\BaseTestCenter', 'testProviderId');
    }
}

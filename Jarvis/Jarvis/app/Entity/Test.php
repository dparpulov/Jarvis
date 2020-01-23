<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'test';

    protected $fillable = [
        'id',
        'name',   
    ];

    public function testType()
    {
        return $this->hasMany('App\Entity\TestType', 'testId');
    }
}

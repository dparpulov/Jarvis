<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class TestType extends Model
{
    protected $table = 'test_type';

    protected $fillable = [
        'id',
        'testId',
        'type',   
    ];

    public function test()
    {
        return $this->belongsTo('App\Entity\Test', 'testId');
    }
}

<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class BaseTestCenter extends Model
{
    protected $table = 'base_test_center';
    protected $fillable = [
        'id',
        'testCenterAssociation',
        'centerNumber',
        'venue',
        'cityId',
        'testProviderId',
        'ieltsId',
        'name',
        'description',
        'clickoutURLId',
    
    ];


    public function city()
    {
        return $this->belongsTo('App\Entity\City', 'cityId');
    }

    public function testProvider()
    {
        return $this->belongsTo('App\Entity\TestProvider', 'testProviderId');
    }

    public function clickoutURL()
    {
        return $this->belongsTo('App\Entity\ClickoutURL', 'clickoutURLId');
    }

    public function editTestDates()
    {
        return $this->hasMany('App\Entity\EditTestDate', 'baseTestCenterId');
    }
}

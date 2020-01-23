<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class EditTestDate extends Model
{
    protected $table = 'edit_test_date';
    protected $fillable = [
        'id',
        'regularTestDate',
        'testTypeId',
        'testDate',
        'testFee',
        'feeCurrency',
        'baseTestCenterId',
        'rawTestDateId',
        
    ];
    
    public function baseTestCenter()
    {
        return $this->belongsTo('App\Entity\BaseTestCenter', 'baseTestCenterId');
    }

    public function rawTestDate()
    {
        return $this->belongsTo('App\Entity\RawTestDate', 'rawTestDateId');
    }

    
}

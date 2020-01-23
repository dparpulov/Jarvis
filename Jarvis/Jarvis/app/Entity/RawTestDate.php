<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class RawTestDate extends Model
{
    protected $table = 'raw_test_date';
    protected $fillable = [
        'id',
        'importFileId',
        'sheet',
        'country',
        'center',
        'centerNumber',
        'venue',
        'town',
        'testDate',
        'testName',
        'testFee',
        'feeCurrency',
    
    ];
    protected $attributes = [
        'importFileId' => 0,
        
    ];

    public function importFile()
    {
        return $this->belongsTo('App\Entity\importFile', 'importFileId');
    }

    public function editTestDate()
    {
        return $this->hasOne('App\Entity\EditTestDate', 'rawTestDateId');
    }

    public function getTownAttribute($value){
        $value = str_replace(array(' Female', ' Male'), "", $value);
        return preg_replace('/\(.*\)/' , '', $value);
    }
}

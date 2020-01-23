<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class importFile extends Model
{
    protected $table = 'import_file';
    protected $fillable = [
        'id',
        'fileName',
        'size',
    
    ];

    public function rawTestDates()
    {
        return $this->hasMany('App\Entity\RawTestDate', 'importFileId');
    }
    
}

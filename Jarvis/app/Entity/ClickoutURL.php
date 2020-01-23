<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class ClickoutURL extends Model
{
    protected $table = 'clickout_u_r_l';

    protected $fillable = [
        'id',
        'trackingLinkName',
        'shortTrackingLink',
        'landingPage',
        'clickmeterCreationDate',
    ];

    public function baseTestCenters()
    {
        return $this->hasMany('App\Entity\baseTestCenter', 'clickoutURLId');
    }
}

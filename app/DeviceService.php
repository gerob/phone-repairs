<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceService extends Model
{
    protected $table = 'device_services';

    protected $fillable = [
        'device_id',
        'service_id',
        'price',
        'upc'
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceService extends Model
{
    protected $table = 'device_services';

    protected $fillable = [
        'service',
        'price',
        'upc'
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}

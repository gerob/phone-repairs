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

    public function device()
    {
        return $this->hasOne(Device::class);
    }

    public function service()
    {
        return $this->hasOne(Service::class);
    }
}

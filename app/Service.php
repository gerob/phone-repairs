<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = ['name'];

    public function devices()
    {
        return $this->belongsToMany(DeviceService::class, 'device_services', 'service_id', 'device_id')
            ->withPivot('price', 'upc')
            ->withTimestamps();
    }
}

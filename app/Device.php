<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';

    protected $fillable = ['manufacturer', 'model', 'image', 'level'];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'device_services', 'device_id', 'service_id')
            ->withPivot('price', 'upc')
            ->withTimestamps();
    }
}

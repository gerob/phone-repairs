<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceService extends Model
{
    protected $table = 'device_services';

    protected $fillable = [
        'price',
        'upc'
    ];

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }
}

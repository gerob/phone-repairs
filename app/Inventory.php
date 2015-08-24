<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';

    protected $fillable = [
        'count',
        'store_number',
        'device_name',
        'service_name',
        'upc',
        'threshold'
    ];

    public function deviceService()
    {
        return $this->belongsTo(DeviceService::class);
    }
}

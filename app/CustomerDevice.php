<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerDevice extends Model
{
    protected $table = 'customer_devices';

    protected $fillable = [
        'store_number',
        'device_name',
        'color',
        'serial_number',
        'passcode',
        'carrier',
        'description',
        'claim',
        'claim_number',
        'warranty_years'
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerDevice extends Model
{
    protected $table = 'customer_device';

    protected $fillable = [
        'customer_id',
        'storeNumber',
        'deviceName',
        'color',
        'serialNumber',
        'carrier',
        'description',
        'memberType',
        'memberNumber',
        'claim',
        'claimNumber',
        'warrantyYears',
        'services'
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function device()
    {
        return $this->hasOne(Device::class);
    }

}

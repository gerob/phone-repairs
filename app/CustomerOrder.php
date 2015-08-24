<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    protected $table = 'customer_orders';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'address',
        'address2',
        'city',
        'state',
        'zip',
        'phone',
        'device_name',
        'store_number',
	    'technician_initials',
        'color',
        'serial_number',
        'passcode',
        'carrier',
        'description',
        'member_type',
        'member_number',
        'claim',
        'claim_number',
        'warranty_years',
        'confirmed'
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function coServices()
    {
        return $this->hasMany(OrderService::class);
    }

    /**
     * Unserialize the services array when accessed
     *
     * @param $value
     * @return mixed
     */
    public function getServicesAttribute($value)
    {
        return unserialize($value);
    }
}

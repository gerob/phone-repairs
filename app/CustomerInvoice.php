<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerInvoice extends Model
{
    protected $table = 'customer_invoices';

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
        'services',
        'confirmed'
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerInvoice extends Model
{
    protected $table = 'customer_invoices';

    protected $fillable = [
        'first_name',
        'last_name',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'phone',
        'device_name',
        'store_number',
        'color',
        'serial_number',
        'carrier',
        'description',
        'member_type',
        'member_number',
        'claim',
        'claim_number',
        'warranty_years',
        'services',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}

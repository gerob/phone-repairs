<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{
    protected $table = 'order_services';

    protected $fillable = [
        'name',
        'price',
        'upc',
        'work_completed',
        'claim_completed',
        'device_service_id'
    ];

    public function order()
    {
        return $this->belongsTo(CustomerOrder::class);
    }
}

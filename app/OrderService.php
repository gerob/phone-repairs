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
    ];

    public function order()
    {
        return $this->hasOne(CustomerOrder::class);
    }
}

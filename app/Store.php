<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $fillable = [
        'number',
        'address',
        'city',
        'phone',
        'zip',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'store_users');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ['email', 'first_name', 'last_name', 'address1', 'address2', 'city', 'state', 'zip', 'phone'];


}

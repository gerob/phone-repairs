<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    protected $table = 'warranties';

    protected $fillable = [
        'level',
        'one_year',
        'two_year',
        'one_price',
        'two_price'
    ];
}

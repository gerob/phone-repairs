<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';

    protected $fillable = ['manufacturer', 'model', 'level'];

    public function services()
    {
        return $this->hasMany(DeviceService::class);
    }
}

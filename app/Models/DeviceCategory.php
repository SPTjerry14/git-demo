<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceCategory extends Model
{
    use HasFactory;

    public function device()
    {
        return $this->hasMany(Device::class);
    }
}
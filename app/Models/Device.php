<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    public function deviceCategory()
    {
        return $this->belongsTo(DeviceCategory::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_device', 'user_id', 'device_id');
    }
}

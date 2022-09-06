<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use HasFactory;
    use SoftDeletes;
    

    protected $fillable = ['code_name', 'name', 'price','insurance','status'];
    
    public function deviceCategory()
    {
        return $this->belongsTo(DeviceCategory::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_device', 'device_id', 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $table = 'buses';
    // đối nghịch với $fillable
    protected $guarded = [

    ];

    public function setFilenamesAttribute($value)
    {
        $this->attributes['image_bus'] = json_encode($value);
    }

    // Display name of driver
    public function users()
    {
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }
}

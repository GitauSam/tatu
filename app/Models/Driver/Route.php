<?php

namespace App\Models\Driver;

use App\Models\Booking\Booking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'start_point',
        'destination',
        'price',
        'status'
    ];

    public function driver() {
        return $this->belongsTo(Driver::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}

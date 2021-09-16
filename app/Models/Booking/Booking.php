<?php

namespace App\Models\Booking;

use App\Models\Driver\Route;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'route_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function route() {
        return $this->belongsTo(Route::class);
    }
}

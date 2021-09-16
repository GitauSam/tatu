<?php

namespace App\Models\Driver;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'id_number',
        'registration_number',
        'capacity',
        'available',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function route() {
        return $this->hasOne(Route::class);
    }
}

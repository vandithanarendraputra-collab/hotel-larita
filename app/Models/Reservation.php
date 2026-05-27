<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'room_type',
        'check_in',
        'check_out',
        'guests',
        'special_requests',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

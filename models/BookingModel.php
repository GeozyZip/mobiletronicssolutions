<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'bookingId';
    public $timestamps = false;

    protected $fillable = [
        'userId',
        'bookingName',
        'date',
        'phoneNumber',
        'message',
        'status',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}

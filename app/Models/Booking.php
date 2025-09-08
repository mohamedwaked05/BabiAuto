<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Payment;


class Booking extends Model
{
    use HasFactory;

    // First step: set primary key for UUID
    protected $primaryKey = 'booking_id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Second step: set fillable attributes
    protected $fillable = [
        'booking_id',
        'vehicle_id',
        'user_id',
        'start_date',
        'end_date',
        'status'
    ];

    // Third step: define relationships
     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'vehicle_id');
    }

    // A Booking Has One Payment (UNCOMMENTED AND FIXED)
    public function payment(): HasOne
    {
        // This defines that a single booking can have one payment record associated with it
        return $this->hasOne(Payment::class, 'booking_id', 'booking_id');
        // 'booking_id' is the foreign key in the payments table
        // 'booking_id' is the local primary key on the bookings table
    }
}

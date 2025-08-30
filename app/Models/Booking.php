<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function payment(): HasOne // Assuming one booking has one payment
    {
        return $this->hasOne(Payment::class, 'booking_id');
    }
}

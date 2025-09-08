<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    //First step set primary key
    protected $primaryKey='payment_id';
    public $incrementing=false;
    protected $keyType='string';
    //Second step set fillable attributes
    protected $fillable=[
        'payment_id',
        'booking_id',
        'amount',
        'method',
        'status',
        'payment_date'
        
    ];
    //Thid step define relationships if any
     // A Payment belongs to a Booking
    public function booking(): BelongsTo
    {
        // This defines the inverse of the HasOne relationship in Booking
        return $this->belongsTo(Booking::class, 'booking_id', 'booking_id');
        // 'booking_id' is the foreign key in the payments table
        // 'booking_id' is the primary key on the bookings table
    }
                                         
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // UUID configuration
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Mass assignable fields
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'phone',
        'address',
        'driver_license',
        'remember_token',
    ];

    // Hidden fields (sensitive data)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationships

    // A user can have many bookings
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'user_id');
    }

    // A user can have many payments
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'user_id');
    }

    // A user can have many maintenance records (if they're mechanics/admins)
    public function maintenances(): HasMany
    {
        return $this->hasMany(Maintenance::class, 'user_id');
    }


    // Check if user has any active bookings
    public function hasActiveBookings(): bool
    {
        return $this->bookings()->where('status', 'confirmed')->exists();
    }

    // Get user's full address (formatted)
    public function getFullAddressAttribute(): string
    {
        return $this->address ?: 'No address provided';
    }
}

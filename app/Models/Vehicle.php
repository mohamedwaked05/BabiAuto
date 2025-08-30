<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Booking;
use App\Models\Maintenance;
use App\Models\Payment;

class Vehicle extends Model
{

    //First step set primary key
    protected $primaryKey = 'vehicle_id';
    public $incrementing = false; // UUIDs are not incrementing
    protected $keyType='string'; // UUIDs are stored as strings

    //Second step set fillable attributes
    protected $fillable = [
        'vehicle_id',
        'name',
        'model',
        'license_plate',
        'color',
        'status',
        'type',
        'features',

    ];
    //Third step define relationships if any
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class ,'vehicle_id');
    }
    public function payments(): HasMany
{
    return $this->hasMany(Payment :: class , 'vehicle_id');

}
    public function maintenances():HasMany
    {
        return $this->hasMany( Maintenance :: class , 'vehicle_id');
    }
}


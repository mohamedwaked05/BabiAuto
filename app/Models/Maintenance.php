<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Vehicle;
use App\Models\User;
class Maintenance extends Model
{
   //First step set primary key
   protected $primaryKey='maintenance_id';
   public $incrementing=false;
   protected $keyType='string';
    //Second step set fillable attributes
    protected $fillable=[
        'maintenance_id',
        'vehicle_id',
        'service_date',
        'cost',
        'description'   
    ];
    //Third step define relationships if any

    // A Maintenance record belongs to a Vehicle
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'vehicle_id');
    }

    // A Maintenance record belongs to a User (the mechanic/admin)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}


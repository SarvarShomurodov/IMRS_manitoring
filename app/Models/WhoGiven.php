<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhoGiven extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    // public function businesTrips()
    // {
    //     return $this->hasMany(BusinesTrip::class, 'quarters_id');
    // }
}

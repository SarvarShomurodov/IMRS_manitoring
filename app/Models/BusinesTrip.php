<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinesTrip extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'goal',
        'start_date',
        'end_date',
        'list_person',
        'data_name',
        'invite_count',
        'quarters_id'
    ];

    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarters_id');
    }
    // public function regionsVal()
    // {
    //     return $this->belongsTo(Region::class, 'regions_id');
    // }
    public function regions()
    {
        return $this->belongsToMany(Region::class, 'region_business_trip', 'business_trip_id', 'region_id');
    }
}

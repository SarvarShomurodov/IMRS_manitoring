<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'basis',
        'organizer',
        'goal',
        'date',
        'foreignNum',
        'localNum',
        'result',
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
        return $this->belongsToMany(Region::class, 'region_event', 'event_id', 'region_id');
    }
}

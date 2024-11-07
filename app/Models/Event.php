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
        'regions_id',
        'foreignNum',
        'localNum',
        'result',
        'quarters_id'
    ];
    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarters_id');
    }
    public function regionsVal()
    {
        return $this->belongsTo(Region::class, 'regions_id');
    }
}

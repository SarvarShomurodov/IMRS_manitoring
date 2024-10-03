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
        'adress',
        'list_person',
        'data_name',
        'invite_count',
        'ball',
        'quarters_id'
    ];

    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarters_id');
    }
}

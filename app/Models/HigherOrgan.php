<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HigherOrgan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'who_given_id',
        'date',
        'ass_number',
        'who_send',
        'letter_date',
        'letter_number',
        'direction',
        'sorov',
        'quarters_id'
    ];

    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarters_id');
    }
    public function whoGiven()
    {
        return $this->belongsTo(WhoGiven::class, 'who_given_id');
    }
    // public function regionsVal()
    // {
    //     return $this->belongsTo(Region::class, 'regions_id');
    // }
    public function regions()
    {
        return $this->belongsToMany(Region::class, 'region_higher_organ', 'higher_organ_id', 'region_id');
    }
}

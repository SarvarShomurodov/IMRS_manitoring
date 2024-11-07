<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'organizer',
        'date',
        'regions_id',
        'invite_count',
        'list_person',
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

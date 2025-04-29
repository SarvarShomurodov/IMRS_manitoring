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
        'sertificateNum',
        'organizer',
        'date',
        'invite_count',
        'list_person',
        'quarters_id'
    ];
    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarters_id');
    }
    public function regions()
    {
        return $this->belongsToMany(Region::class, 'region_training_course');
    }
}

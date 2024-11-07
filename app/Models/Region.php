<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function regions()
    {
        return $this->hasMany(BusinesTrip::class, 'regions_id');
    }
    public function higherOrganRegions()
    {
        return $this->hasMany(HigherOrgan::class, 'regions_id');
    }
    public function meetingRegions()
    {
        return $this->hasMany(Event::class, 'regions_id');
    }
    public function conventionRegions()
    {
        return $this->hasMany(Convention::class, 'regions_id');
    }
    public function trainingCourseRegions()
    {
        return $this->hasMany(TrainingCourse::class, 'regions_id');
    }
}

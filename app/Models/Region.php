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
    public function businesTrips()
{
    return $this->belongsToMany(BusinesTrip::class, 'region_business_trip', 'region_id', 'business_trip_id');
}
    
    public function higherOrgans()
    {
        return $this->belongsToMany(HigherOrgan::class, 'region_higher_organ','region_id','higher_organ_id');
    }
    
    public function events()
    {
        return $this->belongsToMany(Event::class, 'region_event');
    }
    
    public function conventions()
    {
        return $this->belongsToMany(Convention::class, 'region_convention');
    }
    
    public function trainingCourses()
    {
        return $this->belongsToMany(TrainingCourse::class, 'region_training_course');
    }
    
    public function surveys()
    {
        return $this->belongsToMany(Survey::class, 'region_survey');
    }
}

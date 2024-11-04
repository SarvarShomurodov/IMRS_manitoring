<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function businesTrips()
    {
        return $this->hasMany(BusinesTrip::class, 'quarters_id');
    }
    public function youngEconomist()
    {
        return $this->hasMany(YoungEconomist::class, 'quarters_id');
    }
    public function higherOrgans()
    {
        return $this->hasMany(HigherOrgan::class, 'quarters_id');
    }
    public function oPublishes()
    {
        return $this->hasMany(Opublish::class, 'quarters_id');
    }
    public function convention()
    {
        return $this->hasMany(Convention::class, 'quarters_id');
    }
    public function ranks()
    {
        return $this->hasMany(ScientificCouncil::class, 'quarters_id');
    }
    public function seminarRanks()
    {
        return $this->hasMany(ScientificSeminar::class, 'quarters_id');
    }
}

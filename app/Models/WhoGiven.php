<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhoGiven extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'year_num'
    ];

    public function higherOrgans()
    {
        return $this->hasMany(HigherOrgan::class, 'who_given_id');
    }
    public function convention()
    {
        return $this->hasMany(Convention::class, 'who_given_id');
    }
    public function survey()
    {
        return $this->hasMany(Survey::class, 'who_given_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhoGiven extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function higherOrgans()
    {
        return $this->hasMany(HigherOrgan::class, 'who_given_id');
    }
}

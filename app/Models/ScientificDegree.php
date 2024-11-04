<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientificDegree extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'year_num'
    ];
    public function ranks()
    {
        return $this->hasMany(ScientificCouncil::class, 'degree_id');
    }
    public function seminarRanks()
    {
        return $this->hasMany(ScientificSeminar::class, 'degree_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConventionType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'year_num'
    ];
    
    public function conventions()
    {
        return $this->hasMany(Convention::class, 'type_id');
    }
}

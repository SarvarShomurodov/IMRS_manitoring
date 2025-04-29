<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doktarantid extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'year_num'
    ];
    public function doktarants()
    {
        return $this->hasMany(Doktarant::class, 'dokt_id');
    }
}

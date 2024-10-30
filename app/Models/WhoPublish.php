<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhoPublish extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'year_num'
    ];
    public function opublishes()
    {
        return $this->hasMany(Opublish::class, 'oav_id');
    }
}

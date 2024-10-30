<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publish_type extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'year_num'
    ];
    
    public function publishes()
    {
        return $this->hasMany(Publish::class, 'type_id');
    }
    
}

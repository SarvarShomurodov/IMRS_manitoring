<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opublish extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'oav_id',
        'fio',
        'oav_name',
        'date',
        'link',
        'quarters_id'
    ];
    
    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarters_id');
    }

    public function whoPublish()
    {
        return $this->belongsTo(WhoPublish::class, 'oav_id');
    }
}

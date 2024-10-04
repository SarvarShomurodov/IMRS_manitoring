<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YoungEconomist extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'position',
        'date',
        'list_person_local',
        'list_person_no_local',
        'quarters_id'       
    ];
    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarters_id');
    }
}

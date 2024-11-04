<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientificCouncil extends Model
{
    use HasFactory;
    protected $fillable = [
        'degree_id',
        'name',
        'type',
        'start_date',
        'end_date',
        'date',
        'quarters_id'
    ];

    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarters_id');
    }
    public function scienTific()
    {
        return $this->belongsTo(ScientificDegree::class, 'degree_id');
    }
    
}

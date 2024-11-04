<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientificSeminar extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'organizationName',
        'topic',
        'leaderName',
        'degree_id',
        'date',
        'number',
        'conclusion',
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

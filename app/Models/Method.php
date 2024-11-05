<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'name',
        'position',
        'reportName',
        'date',
        'number',
        'conclusion',
        'quarters_id'
    ];
    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarters_id');
    }
}

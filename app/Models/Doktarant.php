<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doktarant extends Model
{
    use HasFactory;
    protected $fillable = [
        'dokt_id',
        'soni',
        'makro',
        'minta',
        // 'ixtisosligi',
        'quarters_id'
    ];
    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarters_id');
    }
    public function doktarantVal()
    {
        return $this->belongsTo(Doktarantid::class, 'dokt_id');
    }
}

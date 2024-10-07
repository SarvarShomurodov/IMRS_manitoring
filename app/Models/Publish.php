<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'author',
        'type_id',
        'jurnal_name',
        'date',
        'number',
        'pages',
        'link',
        'quarters_id',
    ];

    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarters_id');
    }
    public function publish_type()
    {
        return $this->belongsTo(Publish_type::class, 'type_id');
    }
}

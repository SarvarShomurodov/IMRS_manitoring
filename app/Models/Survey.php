<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'who_given_id',
        'assDate',
        'assNumber',
        'whoSend',
        'letterDate',
        'letterNumber',
        'direction',
        'regions_id',
        'shortResult',
        'readyArticle',
        'telegram',
        'pressRelis',
        'infografik',
        'interyu',
        'taqdimot',
        'listPerson',
        'quarters_id'
    ];
    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarters_id');
    }
    public function whoGiven()
    {
        return $this->belongsTo(WhoGiven::class, 'who_given_id');
    }
    public function regionsVal()
    {
        return $this->belongsTo(Region::class, 'regions_id');
    }

}

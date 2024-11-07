<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convention extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'who_given_id',
        'type_id',
        'organizer',
        'date',
        'regions_id',
        'employees_count',
        'list',
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
    public function conventionType()
    {
        return $this->belongsTo(ConventionType::class, 'type_id');
    }
    public function regionsVal()
    {
        return $this->belongsTo(Region::class, 'regions_id');
    }
}

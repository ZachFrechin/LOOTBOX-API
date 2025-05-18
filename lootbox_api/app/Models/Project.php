<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    
    protected $fillable = [
        'type_id',
        'name',
        'time_min',
        'time_max',
        'progress'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function getType(): string
    {
        return 'project';
    }
}

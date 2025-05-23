<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Learning extends Model
{
    protected $table = 'learnings';
    
    protected $fillable = [
        'user_id',
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
        return 'learning';
    }
}

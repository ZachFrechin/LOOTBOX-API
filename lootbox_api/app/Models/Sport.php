<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $table = 'sports';
    
    protected $fillable = [
        'type_id',
        'name',
        'min',
        'max'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function getType(): string
    {
        return 'sport';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    protected $fillable = ['name'];

    public function ranks()
    {
        return $this->belongsToMany(Rank::class, 'rank_plages')
            ->withTimestamps();
    }
}

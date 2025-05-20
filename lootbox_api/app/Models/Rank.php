<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = [
        'name',
        'probability',
        'multiplier',
    ];

    public function lootBox()
    {
        return $this->hasMany(LootBox::class);
    }

    public function modes()
    {
        return $this->belongsToMany(Mode::class, 'rank_plages')
            ->withTimestamps();
    }
}

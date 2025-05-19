<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class Type extends Model
{
    protected $fillable = [
        'name',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // This method must be implemented by child classes
    abstract public function getType(): string;

    public function lootBox()
    {
        return $this->hasMany(LootBox::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LootBox extends Model
{
    protected $fillable = [
        'name',
        'rank_id',
        'type_id',
        'user_id',
    ];

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

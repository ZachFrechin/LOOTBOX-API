<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LootBox extends Model
{
    protected $fillable = [
        'rank_id',
        'user_id',
        'typeable_id',
        'typeable_type'
    ];

    protected $with = ['rank', 'user', 'typeable'];

    protected $appends = ['type_name'];

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function typeable()
    {
        return $this->morphTo();
    }

    public function getTypeAttribute()
    {
        return $this->typeable;
    }

    public function getTypeNameAttribute()
    {
        return $this->typeable ? $this->typeable->getType() : null;
    }
}

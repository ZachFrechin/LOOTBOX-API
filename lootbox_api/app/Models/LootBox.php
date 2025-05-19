<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LootBox extends Model
{
    protected $fillable = [
        'type_id',
        'rank_id',
        'user_id',
        'value'
    ];

    protected $with = ['rank', 'user', 'type'];

    protected $appends = ['type_name'];

    protected $casts = [
        'value' => 'float'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function rank(): BelongsTo
    {
        return $this->belongsTo(Rank::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getTypeNameAttribute()
    {
        return $this->type ? $this->type->name : null;
    }
}

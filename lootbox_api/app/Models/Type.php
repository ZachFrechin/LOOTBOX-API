<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'min',
        'max',
        'unity',
        'CHALLENGE',
        'GENERAL',
        'HALF GOD',
        'S RANKED',
        'progress',
        'category_id',
        'user_id'
    ];

    protected $casts = [
        'min' => 'float',
        'max' => 'float'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function types(): array
    {
        return [
            Sport::class,
            Learning::class,
            Project::class
        ];
    }

    // This method must be implemented by child classes

    public function lootBoxes()
    {
        return $this->hasMany(LootBox::class);
    }

    public function getFields(): array
    {
        return $this->descriptor['fields'] ?? [];
    }

    public function getIcon(): string
    {
        return $this->descriptor['icon'] ?? '📦';
    }

    public function getDescription(): string
    {
        return $this->descriptor['description'] ?? '';
    }
}

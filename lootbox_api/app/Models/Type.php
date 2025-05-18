<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class Type extends Model
{
    protected $fillable = [
        'name'
    ];

    // This method must be implemented by child classes
    abstract public function getType(): string;
}

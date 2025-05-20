<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RankPlage extends Pivot
{
    protected $table = 'rank_plages';
    
    public $incrementing = true;
    
    protected $fillable = [
        'mode_id',
        'rank_id'
    ];
}

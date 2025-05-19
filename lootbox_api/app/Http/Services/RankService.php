<?php

namespace App\Http\Services;

use App\Models\Rank;
use Illuminate\Support\Collection;

class RankService extends Service
{
    public function all(): Collection
    {
        return Rank::all();
    }

    public function byId(int $id): Rank | null
    {
        return Rank::findOrFail($id);
    }
}
<?php

namespace App\Http\Services;

use App\Models\Mode;
use Illuminate\Support\Collection;
use App\Models\User;

class ModeService extends Service
{
    public function all(): Collection
    {
        return Mode::all();
    }

    public function byId(int $id): Mode | null
    {
        return Mode::findOrFail($id);
    }
}
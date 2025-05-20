<?php

namespace App\Http\Services;

use App\Models\Sport;
use Illuminate\Support\Collection;
use App\Models\User;
class SportService extends Service
{
    public function create(array $data): Sport | null
    {
        $sport = Sport::create($data);

        return $sport;
    }

    public function byId(int $id): Sport | null
    {
        return Sport::findOrFail($id);
    }

    public function byName(string $name): Sport | null
    {
        return Sport::where('name', $name)->firstOrFail();
    }

    public function all(User $user): Collection
    {
        return Sport::where('user_id', $user->id)->get();
    }

    public function update(Sport $sport, array $data): Sport | null
    {
        $sport->update($data);
        return $sport;
    }

    public function delete(Sport $sport): bool
    {
        return $sport->delete();
    }
}
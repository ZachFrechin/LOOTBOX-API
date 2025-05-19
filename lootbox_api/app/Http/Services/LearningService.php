<?php

namespace App\Http\Services;

use App\Models\Learning;
use Illuminate\Support\Collection;
use App\Models\User;
class LearningService extends Service
{
    public function create(array $data): Learning | null
    {
        $learning = Learning::create($data);

        return $learning;
    }

    public function byId(int $id): Learning | null
    {
        return Learning::findOrFail($id);
    }

    public function byName(string $name): Learning | null
    {
        return Learning::where('name', $name)->firstOrFail();
    }

    public function all(User $user): Collection
    {
        return Learning::where('user_id', $user->id)->get();
    }

    public function update(Learning $learning, array $data): Learning | null
    {
        $learning->update($data);
        return $learning;
    }

    public function delete(Learning $learning): bool
    {
        return $learning->delete();
    }
}
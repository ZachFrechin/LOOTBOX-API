<?php

namespace App\Http\Services;

use App\Models\Project;
use Illuminate\Support\Collection;
use App\Models\User;
class ProjectService extends Service
{
    public function create(array $data): Project | null
    {
        $project = Project::create($data);

        return $project;
    }

    public function byId(int $id): Project | null
    {
        return Project::findOrFail($id);
    }

    public function byName(string $name): Project | null
    {
        return Project::where('name', $name)->firstOrFail();
    }

    public function all(User $user): Collection
    {
        return Project::where('user_id', $user->id)->get();
    }

    public function update(Project $project, array $data): Project | null
    {
        $project->update($data);
        return $project;
    }

    public function delete(Project $project): bool
    {
        return $project->delete();
    }
}
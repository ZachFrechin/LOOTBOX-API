<?php

namespace App\Http\Services;

use App\Models\Type;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class TypeService
{
    public function create(array $data): Type
    {
        return Type::create($data);
    }

    public function update(Type $type, array $data): Type
    {
        $type->update($data);

        return $type;
    }

    public function delete(Type $type): bool
    {
        return $type->delete();
    }

    public function getById(int $id): ?Type
    {
        return Type::with(['category', 'user'])->find($id);
    }

    public function all(): Collection
    {
        return Type::with(['category', 'user'])->get();
    }

    public function getByUser(User $user): Collection
    {
        return Type::with(['category'])
            ->where('user_id', $user->id)
            ->get();
    }

    public function getByCategory(Category $category): Collection
    {
        return Type::with(['user'])
            ->where('category_id', $category->id)
            ->get();
    }
} 
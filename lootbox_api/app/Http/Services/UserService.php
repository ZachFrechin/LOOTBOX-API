<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Mode;
class UserService extends Service
{
    public function create(string $username, string $password): User | null
    {
        $user = User::create([
            'username' => $username,
            'password' => Hash::make($password),
        ]);

        return $user;
    }

    public function password(User $user, string $password) : bool
    {
        return Hash::check($password, $user->password);
    }

    public function token(User $user): string
    {
        return $user->createToken($user->username . config('sanctum.secret_token'))->plainTextToken;
    }

    public function byUsername(string $username): User | null
    {
        return User::where('username', $username)->firstOrFail();
    }

    public function byId(int $id): User | null
    {
        return User::findOrFail($id);
    }
    public function update(User $user, array $data): User | null
    {
        $user->update($data);
        return $user;
    }

    public function setMode(User $user, Mode $mode): User | null
    {
        $user->mode_id = $mode->id;
        $user->save();
        return $user;
    }

    public function getMode(User $user): Mode | null
    {
        return $user->mode;
    }

    public function updatePassword(User $user, string $password): User | null
    {
        $user->password = Hash::make($password);
        $user->save();
        return $user;
    }
}
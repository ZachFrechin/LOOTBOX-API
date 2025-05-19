<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mode;
use App\Models\Rank;
use App\Models\Type;
use App\Models\Sport;
use App\Models\Learning;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $mode = Mode::create([
            'name' => 'Mode 1',
        ]);

        $rank = Rank::create([
            'name' => 'Rank 1',
            'probability' => 1.0,
            'multiplier' => 1.0
        ]);

        $mode->ranks()->attach($rank->id);

        $user = User::create([
            'username' => 'jack',
            'password' => Hash::make('password'),
            'mode_id' => $mode->id
        ]);

        // Create one of each type
        Sport::create([
            'name' => 'Running',
            'min' => 30,
            'max' => 60,
            'user_id' => $user->id
        ]);

        Learning::create([
            'name' => 'PHP Course',
            'time_min' => '01:00:00',
            'time_max' => '02:00:00',
            'user_id' => $user->id
        ]);

        Project::create([
            'name' => 'Website',
            'time_min' => '02:00:00',
            'time_max' => '04:00:00',
            'progress' => 0.00,
            'user_id' => $user->id
        ]);
    }
}

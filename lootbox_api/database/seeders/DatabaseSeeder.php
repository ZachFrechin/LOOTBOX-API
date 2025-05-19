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
        $this->call([
            CategorySeeder::class,
        ]);

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
    }
}

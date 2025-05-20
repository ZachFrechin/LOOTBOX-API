<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Mode;
use App\Models\Category;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'username' => 'jack',
            'password' => Hash::make('password'),
            'mode_id' => Mode::where('name', 'NORMAL')->first()->id
        ]);

        $type = Type::create([
            'name' => 'Pompe',
            'min' => 4,
            'max' => 8,
            'unity' => '.',
            'CHALLENGE' => "Pas de genoux a terre",
            'GENERAL' => "Claqué",
            'HALF GOD' => "Bras alterné",
            'S RANKED' => "Burpees",
            'category_id' => Category::where('name', 'Sport')->first()->id,
            'user_id' => $user->id,
            'progress' => null
        ]);

        $type = Type::create([
            'name' => 'Origo',
            'min' => 15,
            'max' => 30,
            'unity' => 'min',
            'CHALLENGE' => "Pas de clope",
            'GENERAL' => "pas d'autre travaux",
            'HALF GOD' => "Téléphone eteint",
            'S RANKED' => "Finir un objectif complet",
            'category_id' => Category::where('name', 'Projet')->first()->id,
            'user_id' => $user->id,
            'progress' => 50.0
        ]);

        $type = Type::create([
            'name' => 'Try Hack Me',
            'min' => 10,
            'max' => 20,
            'unity' => 'min',
            'CHALLENGE' => "Lit tout",
            'GENERAL' => "Sans pause",
            'HALF GOD' => "Plus exercice",
            'S RANKED' => "Double le temps",
            'category_id' => Category::where('name', 'Apprentissage')->first()->id,
            'user_id' => $user->id,
            'progress' => 1.0
        ]);
        
        
    }
}

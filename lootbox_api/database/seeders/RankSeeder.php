<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rank;
use Symfony\Component\Uid\Factory\RandomBasedUuidFactory;
class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // NORMAL RANK MODEÒ
        Rank::create([
            'name' => 'Commun',
            'probability' => 0.6,
            'multiplier' => 1,
        ]);
        Rank::create([
            'name' => 'Atypique',
            'probability' => 0.15,
            'multiplier' => 2,
        ]);
        Rank::create([
            'name' => 'Rare',
            'probability' => 0.08,
            'multiplier' => 3.3,
        ]);
        Rank::create([
            'name' => 'Epique I',
            'probability' => 0.02,
            'multiplier' => 4.7,
        ]);
        Rank::create([
            'name' => 'Exotique I',
            'probability' => 0.001,
            'multiplier' => 6.5,
        ]);

        // CHALLENGER RANK MODE
        Rank::create([
            'name' => 'Epique II',
            'probability' => 0.7,
            'multiplier' => 4.6,
        ]);
        Rank::create([
            'name' => 'Exotique II',
            'probability' => 0.13,
            'multiplier' => 6.6,
        ]);
        Rank::create([
            'name' => 'Légendaire',
            'probability' => 0.04,
            'multiplier' => 8.1,
        ]);
        Rank::create([
            'name' => 'F Rank I',
            'probability' => 0.002,
            'multiplier' => 10.9,
        ]);

        // GENERAL RANK
        Rank::create([
            'name' => 'F Rank II',
            'probability' => 0.6,
            'multiplier' => 8.9,
        ]);
        Rank::create([
            'name' => 'E RANK',
            'probability' => 0.2,
            'multiplier' => 10.7,
        ]);
        Rank::create([
            'name' => 'D RANK',
            'probability' => 0.04,
            'multiplier' => 12.4,
        ]);
        Rank::create([
            'name' => 'C RANK',
            'probability' => 0.01,
            'multiplier' => 14.2,
        ]);
        Rank::create([
            'name' => 'B RANK I',
            'probability' => 0.003,
            'multiplier' => 16.2,
        ]);

        // HALF GOD MODE
        Rank::create([
            'name' => 'B RANK II',
            'probability' => 0.73,
            'multiplier' => 14.1,
        ]);
        Rank::create([
            'name' => 'A RANK',
            'probability' => 0.15,
            'multiplier' => 16.3,
        ]);
        Rank::create([
            'name' => 'A+ RANK',
            'probability' => 0.02,
            'multiplier' => 18.7,
        ]);
        Rank::create([
            'name' => 'S RANK I',
            'probability' => 0.003,
            'multiplier' => 20.7,
        ]);
        
        // S RANKED MODE
        Rank::create([
            'name' => 'S RANK II',
            'probability' => 0.7,
            'multiplier' => 17.7,
        ]);
        Rank::create([
            'name' => 'S+ RANK',
            'probability' => 0.15,
            'multiplier' => 19.9,
        ]);
        Rank::create([
            'name' => 'SS RANK',
            'probability' => 0.08,
            'multiplier' => 22.1,
        ]);
        Rank::create([
            'name' => 'SSS RANK',
            'probability' => 0.01,
            'multiplier' => 25.3,
        ]);
        Rank::create([
            'name' => 'GOD RANK',
            'probability' => 0.008,
            'multiplier' => 27.5,
        ]);
        Rank::create([
            'name' => 'DEMON RANK',
            'probability' => 0.003,
            'multiplier' => 29.7,
        ]);
        Rank::create([
            'name' => 'MYTH RANK',
            'probability' => 0.001,
            'multiplier' => 35.5,
        ]);
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    }
}

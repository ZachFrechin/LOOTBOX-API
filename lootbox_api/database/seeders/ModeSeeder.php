<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mode;
use App\Models\Rank;
class ModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $normal = Mode::create(["name" => "NORMAL"]);
        $challenger = Mode::create(["name" => "CHALLENGER"]);
        $general = Mode::create(["name" => "GENERAL"]);
        $halfGod = Mode::create(["name" => "HALF GOD"]);
        $sRanked = Mode::create(["name" => "S RANKED"]);
        
        $normal->ranks()->attach(Rank::where('name', 'Commun')->first());
        $normal->ranks()->attach(Rank::where('name', 'Atypique')->first());
        $normal->ranks()->attach(Rank::where('name', 'Rare')->first());
        $normal->ranks()->attach(Rank::where('name', 'Epique I')->first());
        $normal->ranks()->attach(Rank::where('name', 'Exotique I')->first());
    
        $challenger->ranks()->attach(Rank::where('name', 'Epique II')->first());
        $challenger->ranks()->attach(Rank::where('name', 'Exotique II')->first());
        $challenger->ranks()->attach(Rank::where('name', 'Légendaire')->first());
        $challenger->ranks()->attach(Rank::where('name', 'F Rank I')->first());

        $general->ranks()->attach(Rank::where('name', 'F Rank II')->first());
        $general->ranks()->attach(Rank::where('name', 'E RANK')->first());
        $general->ranks()->attach(Rank::where('name', 'D RANK')->first());
        $general->ranks()->attach(Rank::where('name', 'C RANK')->first());
        $general->ranks()->attach(Rank::where('name', 'B RANK I')->first());

        $halfGod->ranks()->attach(Rank::where('name', 'B RANK II')->first());
        $halfGod->ranks()->attach(Rank::where('name', 'A RANK')->first());
        $halfGod->ranks()->attach(Rank::where('name', 'A+ RANK')->first());
        $halfGod->ranks()->attach(Rank::where('name', 'S RANK I')->first());

        $sRanked->ranks()->attach(Rank::where('name', 'S RANK II')->first());
        $sRanked->ranks()->attach(Rank::where('name', 'S+ RANK')->first());
        $sRanked->ranks()->attach(Rank::where('name', 'SS RANK')->first());
        $sRanked->ranks()->attach(Rank::where('name', 'SSS RANK')->first());
        $sRanked->ranks()->attach(Rank::where('name', 'GOD RANK')->first());
        $sRanked->ranks()->attach(Rank::where('name', 'DEMON RANK')->first());
        $sRanked->ranks()->attach(Rank::where('name', 'MYTH RANK')->first());
    }
}

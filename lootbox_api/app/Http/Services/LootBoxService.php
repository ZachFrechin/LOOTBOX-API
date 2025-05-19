<?php

namespace App\Http\Services;

use App\Models\LootBox;
use App\Models\User;
use App\Models\Type;
use App\Models\Rank;
use Illuminate\Support\Collection;
use App\Models\Sport;
use App\Models\Learning;
use App\Models\Project;

class LootBoxService extends Service
{
    public function create(array $data): LootBox | null
    {
        $lootBox = LootBox::create($data);
        return $lootBox;
    }

    public function lootRank(User $user) : Rank
    {
        $mode = $user->mode;
        $rank = $mode->ranks;
        $randomValue = mt_rand(0, 100) / 100;
        $cumulativeProbability = 0;

        foreach ($rank as $currentRank) {
            $cumulativeProbability += $currentRank->probability;
            if ($randomValue <= $cumulativeProbability) {
                return $currentRank;
            }
        }

        return $rank->first();
    }

    public function lootType()
    {
        $types = Type::types();
        $randomType = $types[array_rand($types)];
        return $randomType::inRandomOrder()->first();
    }

    public function loot(User $user): LootBox
    {
        $rank = $this->lootRank($user);
        $type = $this->lootType();
        
        $lootbox = $this->create([
            'rank_id' => $rank->id,
            'user_id' => $user->id,
            'typeable_id' => $type->id,
            'typeable_type' => get_class($type)
        ]);
        
        return $lootbox;
    }

    public function all(User $user) : Collection
    {
        return LootBox::where('user_id', $user->id)->get();
    }
}
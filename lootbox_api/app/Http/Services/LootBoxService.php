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
use Exception;

class LootBoxService extends Service
{

    public function all(User $user): Collection
    {
        return LootBox::where('user_id', $user->id)->get();
    }

    public function create(array $data): LootBox | null
    {
        $lootBox = LootBox::create($data);
        return $lootBox;
    }

    public function loot(User $user): LootBox
    {
        $rank = $this->getRandomRank($user->mode);
        if (!$rank) {
            throw new Exception('No ranks available for this mode');
        }

        $type = $this->getRandomType($user);
        if (!$type) {
            throw new Exception('No types available for this user');
        }
        
        $randomValue = mt_rand($type->min * 100, $type->max * 100) / 100;
        $finalValue = $randomValue * $rank->multiplier;

        return LootBox::create([
            'type_id' => $type->id,
            'rank_id' => $rank->id,
            'user_id' => $user->id,
            'value' => $finalValue
        ]);
    }

    public function getByUser(User $user): Collection
    {
        return LootBox::with(['type', 'rank'])
            ->where('user_id', $user->id)
            ->get();
    }

    private function getRandomRank($mode): ?Rank
    {
        $ranks = $mode->ranks;
        if ($ranks->isEmpty()) {
            return null;
        }

        $totalProbability = $ranks->sum('probability');
        $random = mt_rand(0, $totalProbability * 100) / 100;

        $currentProbability = 0;
        foreach ($ranks as $rank) {
            $currentProbability += $rank->probability;
            if ($random <= $currentProbability) {
                return $rank;
            }
        }

        return $ranks->first();
    }

    private function getRandomType(User $user): ?Type
    {
        return Type::where('user_id', $user->id)
            ->inRandomOrder()
            ->first();
    }
}
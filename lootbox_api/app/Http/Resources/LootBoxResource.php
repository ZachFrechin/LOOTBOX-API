<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\RankResource;
use App\Http\Resources\TypeResource;
use App\Http\Resources\UserResource;

class LootBoxResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'rank' => new RankResource($this->rank),
            'type' => new TypeResource($this->type),
            'user' => new UserResource($this->user),
        ];
    }
}

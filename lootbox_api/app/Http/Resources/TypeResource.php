<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeResource extends JsonResource
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
            'name' => $this->name,
            'min' => $this->min,
            'max' => $this->max,
            'unity' => $this->unity,
            'challenge' => $this->challenge,
            'general' => $this->general,
            'half_god' => $this->half_god,
            's_ranked' => $this->s_ranked,
            'category' => $this->category,
            'user' => $this->user
        ];
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\LootBoxService;
use App\Http\Resources\LootBoxResource;
use Illuminate\Http\JsonResponse;
use App\Models\LootBox;

class LootBoxController extends Controller
{
    private LootBoxService $lootBoxService;

    public function __construct(LootBoxService $lootBoxService)
    {
        $this->lootBoxService = $lootBoxService;
    }

    public function index(Request $request) : JsonResponse
    {
        return response()->json(["lootboxes" => LootBoxResource::collection($this->lootBoxService->all($request->user()))], 200);
    }

    public function loot(Request $request) : JsonResponse
    {
        $lootBox = $this->lootBoxService->loot($request->user());
        return response()->json(["lootbox" => new LootBoxResource($lootBox)], 201);
    }
}

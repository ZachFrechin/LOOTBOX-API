<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\LootBoxService;
use App\Http\Resources\LootBoxResource;
use Illuminate\Http\JsonResponse;
use App\Models\LootBox;
use App\Models\User;
use Exception;

class LootBoxController extends Controller
{
    private LootBoxService $lootBoxService;

    public function __construct(LootBoxService $lootBoxService)
    {
        $this->lootBoxService = $lootBoxService;
    }

    public function index(Request $request) : JsonResponse
    {
        $lootBoxes = $this->lootBoxService->getByUser($request->user());
        return response()->json(LootBoxResource::collection($lootBoxes));
    }

    public function loot(Request $request) : JsonResponse
    {
        try {
            $lootBox = $this->lootBoxService->loot($request->user());
            return response()->json(["lootbox" => new LootBoxResource($lootBox)], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}

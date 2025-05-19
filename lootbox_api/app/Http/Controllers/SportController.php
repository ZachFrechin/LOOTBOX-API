<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SportService;
use App\Http\Requests\Sport\CreateRequest;
use App\Http\Requests\Sport\UpdateRequest;
use App\Http\Resources\SportResource;
use Illuminate\Http\JsonResponse;
use App\Models\Sport;

class SportController extends Controller
{
    private SportService $sportService;

    public function __construct(SportService $sportService)
    {
        $this->sportService = $sportService;
    }

    public function index(Request $request): JsonResponse
    {
        $sports = $this->sportService->all($request->user());
        return response()->json(["sports" => SportResource::collection($sports)], 200);
    }

    public function create(CreateRequest $request): JsonResponse
    {
        $sport = $this->sportService->create(array_merge($request->all(), ['user_id' => $request->user()->id]));
        return response()->json(["sport" => new SportResource($sport)], 201);
    }
    public function show(Sport $sport): JsonResponse
    {
        return response()->json(["sport" => new SportResource($sport)], 200);
    }

    public function update(UpdateRequest $request, Sport $sport): JsonResponse
    {
        $sport = $this->sportService->update($sport, $request->all());
        return response()->json(["sport" => new SportResource($sport)], 200);
    }

    public function destroy(Sport $sport): JsonResponse
    {
        $this->sportService->delete($sport);
        return response()->json(["message" => "Sport deleted successfully"], 200);
    }
}

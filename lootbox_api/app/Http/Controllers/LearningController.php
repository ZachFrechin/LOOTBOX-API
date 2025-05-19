<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\LearningService;
use App\Http\Requests\Learning\CreateRequest;
use App\Http\Requests\Learning\UpdateRequest;
use App\Http\Resources\LearningResource;
use Illuminate\Http\JsonResponse;
use App\Models\Learning;

class LearningController extends Controller
{
    private LearningService $learningService;

    public function __construct(LearningService $learningService)
    {
        $this->learningService = $learningService;
    }

    public function index(Request $request): JsonResponse
    {
        $learnings = $this->learningService->all($request->user());
        return response()->json(["learnings" => LearningResource::collection($learnings)], 200);
    }

    public function create(CreateRequest $request): JsonResponse
    {
        $learning = $this->learningService->create(array_merge($request->all(), ['user_id' => $request->user()->id]));
        return response()->json(["learning" => new LearningResource($learning)], 201);
    }
    public function show(Learning $learning): JsonResponse
    {
        return response()->json(["learning" => new LearningResource($learning)], 200);
    }

    public function update(UpdateRequest $request, Learning $learning): JsonResponse
    {
        $learning = $this->learningService->update($learning, $request->all());
        return response()->json(["learning" => new LearningResource($learning)], 200);
    }

    public function destroy(Learning $learning): JsonResponse
    {
        $this->learningService->delete($learning);
        return response()->json(["message" => "Learning deleted successfully"], 200);
    }
}

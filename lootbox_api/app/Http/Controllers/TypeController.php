<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Category;
use App\Services\TypeService;
use App\Http\Requests\Type\StoreTypeRequest;
use App\Http\Requests\Type\UpdateTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\TypeResource;

class TypeController extends Controller
{
    public function __construct(
        private TypeService $typeService
    ) {}

    public function index(): JsonResponse
    {
        $types = $this->typeService->all();
        return response()->json(TypeResource::collection($types));
    }

    public function store(StoreTypeRequest $request): JsonResponse
    {
        $type = $this->typeService->create(array_merge($request->validated(), ['user_id' => $request->user()->id]));
        return response()->json(new TypeResource($type), 201);
    }

    public function show(Type $type): JsonResponse
    {
        $type = $this->typeService->getById($type->id);
        return response()->json(new TypeResource($type), 200);
    }

    public function update(UpdateTypeRequest $request, Type $type): JsonResponse
    {
        if ($type->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $type = $this->typeService->update($type, $request->validated());
        return response()->json(new TypeResource($type));
    }

    public function destroy(Type $type): JsonResponse
    {
        return response()->json( $this->typeService->delete($type), 204);
    }

    public function getByUser(Request $request): JsonResponse
    {
        $types = $this->typeService->getByUser($request->user());
        return response()->json(TypeResource::collection($types));
    }

    public function getByCategory(Category $category): JsonResponse
    {
        $types = $this->typeService->getByCategory($category);
        return response()->json(TypeResource::collection($types));
    }
} 
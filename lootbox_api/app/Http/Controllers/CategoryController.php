<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryService $categoryService
    ) {}

    public function index(): JsonResponse
    {
        $categories = $this->categoryService->getAll();
        return response()->json($categories);
    }

    public function show(Category $category): JsonResponse
    {
        $category = $this->categoryService->getById($category->id);
        return response()->json($category);
    }
} 
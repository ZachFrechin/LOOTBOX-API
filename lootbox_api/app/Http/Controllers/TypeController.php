<?php

namespace App\Http\Controllers;

use App\Http\Services\TypeService;
use Illuminate\Http\JsonResponse;

class TypeController extends Controller
{
    protected TypeService $typeService;

    public function __construct()
    {
        $this->typeService = new TypeService();
    }

    public function index(): JsonResponse
    {
        $types = $this->typeService->all();
        return response()->json(['types' => $types]);
    }
} 
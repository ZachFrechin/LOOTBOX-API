<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ModeService;
use App\Http\Resources\ModeResource;
use Illuminate\Http\JsonResponse;

class ModeController extends Controller
{
    private ModeService $modeService;

    public function __construct(ModeService $modeService)
    {
        $this->modeService = $modeService;
    }

    public function index() : JsonResponse
    {
        return response()->json([
            'modes' => ModeResource::collection($this->modeService->all()),
        ], 200);
    }
    
}

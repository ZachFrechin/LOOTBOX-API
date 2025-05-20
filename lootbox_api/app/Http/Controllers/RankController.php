<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\RankService;
use App\Http\Resources\RankResource;
use Illuminate\Http\JsonResponse;
use App\Models\Rank;

class RankController extends Controller
{
    public function __construct(
        private RankService $rankService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json(RankResource::collection($this->rankService->all()));
    }
}

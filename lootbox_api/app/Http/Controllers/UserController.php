<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdatePassword;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Services\UserService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\User\UpdateRequest;
use App\Models\Mode;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show(Request $request) : JsonResponse
    {
        return response()->json([
            'user' => new UserResource($request->user()),
        ], 200);
    }

    public function update(UpdateRequest $request) : JsonResponse
    {
        $user = $request->user();
        $user = $this->userService->update($user, $request->all());
        return response()->json([
            'user' => new UserResource($user),
        ], 200);
    }

    public function updatePassword(UpdatePassword $request) : JsonResponse
    {
        $user = $request->user();
        $user = $this->userService->updatePassword($user, $request->password);
        return response()->json([
            'user' => new UserResource($user),
        ], 200);
    }

    public function setMode(Request $request, Mode $mode) : JsonResponse
    {
        $user = $request->user();
        $user = $this->userService->setMode($user, $mode);
        return response()->json([
            'user' => new UserResource($user),
        ], 200);
    }
}

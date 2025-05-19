<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\UserService;

class AuthController extends Controller
{
    protected UserService $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->userService->create($request->username, $request->password);
        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $user = $this->userService->byUsername($request->username);
        if(!$user || !$this->userService->password($user, $request->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }
        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $this->userService->token($user),
        ], 200);
    }
}

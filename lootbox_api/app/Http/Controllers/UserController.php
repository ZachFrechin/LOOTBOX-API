<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function show(Request $request)
    {
        return response()->json([
            'user' => new UserResource($request->user()),
        ], 200);
    }
}

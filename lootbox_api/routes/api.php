<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
Route::prefix("v1")->group(function () {

    Route::prefix("auth")->group(function () {
        Route::post("register", [AuthController::class, "register"]);
        Route::post("login", [AuthController::class, "login"]);
    });

    Route::prefix("user")->group(function () {
        Route::get("me", [UserController::class, "show"])->middleware("auth:sanctum");
    });
});

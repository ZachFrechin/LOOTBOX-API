<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SportController;

Route::prefix("v1")->group(function () {

    Route::prefix("auth")->group(function () {
        Route::post("register", [AuthController::class, "register"]);
        Route::post("login", [AuthController::class, "login"]);
    });

    Route::prefix("user")->group(function () {
        Route::get("me", [UserController::class, "show"])->middleware("auth:sanctum");
    });

    Route::prefix("project")->group(function () {
        Route::get("", [ProjectController::class, "index"])->middleware("auth:sanctum");
        Route::post("", [ProjectController::class, "create"])->middleware("auth:sanctum");
        Route::get("{project}", [ProjectController::class, "show"])->middleware("auth:sanctum");
        Route::put("{project}", [ProjectController::class, "update"])->middleware("auth:sanctum");
        Route::delete("{project}", [ProjectController::class, "destroy"])->middleware("auth:sanctum");
    });

    Route::prefix("sport")->group(function () {
        Route::get("", [SportController::class, "index"])->middleware("auth:sanctum");
        Route::post("", [SportController::class, "create"])->middleware("auth:sanctum");
        Route::get("{sport}", [SportController::class, "show"])->middleware("auth:sanctum");
        Route::put("{sport}", [SportController::class, "update"])->middleware("auth:sanctum");
        Route::delete("{sport}", [SportController::class, "destroy"])->middleware("auth:sanctum");
    });
});

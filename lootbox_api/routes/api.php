<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\LootBoxController;
use App\Http\Controllers\ModeController;
use App\Http\Controllers\TypeController;

Route::prefix("v1")->group(function () {

    Route::prefix("auth")->group(function () {
        Route::post("register", [AuthController::class, "register"]);
        Route::post("login", [AuthController::class, "login"]);
    });

    Route::prefix("user")->group(function () {
        Route::get("", [UserController::class, "show"])->middleware("auth:sanctum");
        Route::put("", [UserController::class, "update"])->middleware("auth:sanctum");
        Route::put("/password", [UserController::class, "updatePassword"])->middleware("auth:sanctum");
        Route::put("/mode/{mode}", [UserController::class, "setMode"])->middleware("auth:sanctum");
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

    Route::prefix("learning")->group(function () {
        Route::get("", [LearningController::class, "index"])->middleware("auth:sanctum");
        Route::post("", [LearningController::class, "create"])->middleware("auth:sanctum");
        Route::get("{learning}", [LearningController::class, "show"])->middleware("auth:sanctum");
        Route::put("{learning}", [LearningController::class, "update"])->middleware("auth:sanctum");
        Route::delete("{learning}", [LearningController::class, "destroy"])->middleware("auth:sanctum");
    });

    Route::prefix("lootbox")->group(function () {
        Route::get("", [LootBoxController::class, "index"])->middleware("auth:sanctum");
        Route::post("", [LootBoxController::class, "loot"])->middleware("auth:sanctum");
    });

    Route::prefix("mode")->group(function () {
        Route::get("", [ModeController::class, "index"])->middleware("auth:sanctum");
    });

    Route::prefix("type")->group(function () {
        Route::get("", [TypeController::class, "index"])->middleware("auth:sanctum");
    });

});

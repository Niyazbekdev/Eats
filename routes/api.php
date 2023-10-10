<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\MenuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/menu')
    ->group(function (){
        Route::get('/', [MenuController::class, 'index']);
        Route::get('/{id}', [MenuController::class, 'show']);
        Route::post('/', [MenuController::class, 'store']);
        Route::put('/{id}', [MenuController::class, 'update']);
        Route::delete('/{id}', [MenuController::class, 'destroy']);
    });

Route::prefix('/food')
    ->group(function (){
        Route::get('/', [FoodController::class, 'index']);
        Route::post('/', [FoodController::class, 'store']);
    });

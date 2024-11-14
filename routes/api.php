<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\QuizApiController;
use App\Http\Controllers\PerfilApiController;

Route::post('/login',[AuthAPIController::class,'login']);
Route::post('registro',[AuthApiController::class,'registro']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/perfil', [PerfilApiController::class, 'show']);
    Route::get('/categoria', [QuizApiController::class, 'categoria']);
    Route::get('/subcategoria/{categoria_id}', [QuizApiController::class, 'subcategoria']);
    Route::get('/quiz', [QuizApiController::class, 'perguntas']);

    Route::post('/logout', [AuthAPIController::class, 'logout']);
});

/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

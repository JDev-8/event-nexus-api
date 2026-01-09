<?php

use App\Http\Controllers\Api\V1\EventController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\ShowtimeController;
use App\Http\Controllers\Api\TicketController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::prefix('v1')->group(function (){
  Route::get('/events', [EventController::class, 'index']);
});

Route::apiResource('movies', MovieController::class);
Route::apiResource('showtimes', ShowtimeController::class);

Route::middleware('auth:sanctum')->group(function (){
  Route::post('/logout', [AuthController::class, 'logout']);

  Route::get('/user', function (Request $request){
    return $request->user();
  });

  Route::post('/tickets', [TicketController::class, 'store']);
  Route::get('/tickets', [TicketController::class, 'index']);
});

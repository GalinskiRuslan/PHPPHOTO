<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test', function () {
    return 'hello';
});
Route::get('/desks', [\App\Http\Controllers\Api\DeckController::class, 'index']);
Route::get('/desks/{id}', [\App\Http\Controllers\Api\DeckController::class, 'show']);
Route::delete('/desks/{id}', [\App\Http\Controllers\Api\DeckController::class, 'destroy']);
Route::post('/desks', [\App\Http\Controllers\Api\DeckController::class, 'store']);

Route::apiResources(['desks-list' => \App\Http\Controllers\Api\DeskListController::class,]);

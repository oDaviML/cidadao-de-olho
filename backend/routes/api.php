<?php

use App\Http\Controllers\RedeSocialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 */

Route::get("/", function (Request $request) {
    return response()->json([
        "message" => "Welcome to the API",
        "status" => 200,
    ]);
})->name("api.welcome");

Route::get("rede-social/top5", [RedeSocialController::class,"getTop5"])->name("rede-social.top5");


Route::get("deputados", [\App\Http\Controllers\DeputadoController::class,"index"])->name("deputados.index");

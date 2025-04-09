<?php

use App\Http\Controllers\RedeSocialController;
use App\Http\Controllers\VerbasIndenizatoriasController;
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

Route::get("rede-social/ranking/", [RedeSocialController::class, "getTopRedes"])->name("rede-social.ranking.top5");

Route::get("verbas/ranking/top5/{mes}", [VerbasIndenizatoriasController::class, "topDeputadosVerbasMes"])->name("verbas.ranking.top5.mes");

Route::get("deputados/", [\App\Http\Controllers\DeputadoController::class, "index"])->name("deputados.lista");

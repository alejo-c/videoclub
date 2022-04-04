<?php

use App\Http\Controllers\ApiCatalogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// 	return $request->user();
// });

Route::group(['middleware' => 'auth.basic'], function () {
	Route::resource('catalog', ApiCatalogController::class, ['except' => ['create', 'edit']]);
	Route::put('catalog/{id}/rent', [ApiCatalogController::class, 'rent']);
	Route::put('catalog/{id}/return', [ApiCatalogController::class, 'return']);
});

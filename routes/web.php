<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;

Route::get("/", [HomeController::class, "getHome"]);

Route::get("catalog", [CatalogController::class, "getIndex"]);

Route::get("catalog/show/{id}", [CatalogController::class, "getShow"])->whereNumber('id');

Route::get("catalog/create", [CatalogController::class, "getCreate"]);

Route::get("catalog/edit/{id}", [CatalogController::class, "getEdit"])->whereNumber('id');

Route::get("login", function () {
	return view("auth.login");
});

Route::post("logout", function () {
	return "Saliendo de la sesión";
});

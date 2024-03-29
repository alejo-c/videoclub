<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, "getHome"]);

Route::get('catalog', [CatalogController::class, "getIndex"])->middleware(['auth'])->name("catalog");

Route::get('catalog/show/{id}', [CatalogController::class, "getShow"])
	->whereNumber("id")->middleware(["auth"])->name("catalog/show");

Route::get('catalog/create', [CatalogController::class, "getCreate"])
	->middleware(['auth']);

Route::post("catalog/create", [CatalogController::class, "postCreate"])
	->middleware(['auth'])->name("catalog/create");

Route::get('catalog/edit/{id}', [CatalogController::class, "getEdit"])
	->whereNumber("id")->middleware(["auth"]);

Route::put("catalog/edit/{id}", [CatalogController::class, "putEdit"])
	->whereNumber("id")->middleware(['auth'])->name("catalog/edit");

Route::put("catalog/rent/{id}", [CatalogController::class, "putRent"])
	->whereNumber("id")->middleware(['auth']);

Route::put("catalog/return/{id}", [CatalogController::class, "putReturn"])
	->whereNumber("id")->middleware(['auth']);

Route::delete("catalog/delete/{id}", [CatalogController::class, "deleteMovie"])
	->whereNumber("id")->middleware(['auth']);

require __DIR__ . '/auth.php';

# Laravel
## composer install
## npm install
## cp .env.example .env
## php artisan key:generate

# update routes
## php artisan cache:clear
## php artisan route:cache

# update config
## php artisan config:clear
## php artisan config:cache
## php artisan view:clear

# migration
## php artisan migrate:install
## php artisan make:migration create_table_name_table --create=table_name
## php artisan migrate:status
## php artisan migrate:reset
## php artisan migrate

# seed
## php artisan make:seeder UsersTableSeeder
## php artisan db:seed

# model
## php artisan make:model Movie

# breeze
## composer require laravel/breeze --dev
## php artisan breeze:install
## npm install
## npm run dev

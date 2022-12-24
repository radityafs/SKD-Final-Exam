<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RecipeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [RecipeController::class, "landingPage"]);

//group guest
Route::group(["middleware" => "guest"], function () {
    Route::view("/login", "pages.auth.login");
    Route::post("/login", [AuthController::class, "login"])->name("login");

    Route::view("/register", "pages.auth.register");
    Route::post("/register", [AuthController::class, "register"])->name("register");

    Route::get("auth/{provider}", [ProviderController::class, "loginProvider"]);
    Route::get("auth/callback/{provider}", [ProviderController::class, "callbackProvider"]);
});

Route::get("/dashboard", [AdminController::class, "dashboard"])->middleware("auth");


Route::get("/logout", [AuthController::class, "logout"]);

Route::group(["middleware" => "auth"], function () {
    Route::get("/add-recipe", [RecipeController::class,"addRecipePage"]);
    Route::post("/add-recipe", [RecipeController::class,"addRecipe"]);    
});

Route::get("/list-recipe", [RecipeController::class,"listRecipePage"]);
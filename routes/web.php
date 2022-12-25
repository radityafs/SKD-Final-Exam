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
Route::get("/list-recipe", [RecipeController::class,"listRecipePage"]);
Route::get("/recipe/{id}", [RecipeController::class, "detailRecipePage"]);

//group guest
Route::group(["middleware" => "guest"], function () {
    Route::view("/login", "pages.auth.login");
    Route::post("/login", [AuthController::class, "login"])->name("login");

    Route::view("/register", "pages.auth.register");
    Route::post("/register", [AuthController::class, "register"])->name("register");

    Route::get("auth/{provider}", [ProviderController::class, "loginProvider"]);
    Route::get("auth/callback/{provider}", [ProviderController::class, "callbackProvider"]);
});


Route::group(["middleware" => "auth"], function () {
    Route::get("/add-recipe", [RecipeController::class,"addRecipePage"]);
    Route::post("/add-recipe", [RecipeController::class,"addRecipe"]);    

    Route::get("/admin/dashboard", [AdminController::class, "dashboard"]);
    Route::get("/admin/dashboard/user", [AdminController::class, "userPage"]);
    Route::get("/admin/dashboard/category", [AdminController::class, "categoryPage"]);
    Route::get("/admin/dashboard/recipe", [AdminController::class, "recipePage"]);

    Route::get("/users/{id}/status", [AdminController::class, "putUserStatus"]);
    Route::get("/users/{id}/delete", [AdminController::class, "deleteUser"]);
    Route::post("/category", [AdminController::class, "postCategory"]);
    Route::get("/category/{id}/delete", [AdminController::class, "deleteCategory"]);
    Route::post("/category/{id}/update", [AdminController::class, "putCategory"]);
    Route::get("/recipe/{id}/status", [AdminController::class, "putRecipeStatus"]);
    Route::get("/recipe/{id}/delete", [AdminController::class, "deleteRecipe"]);

    Route::get("/logout", [AuthController::class, "logout"]);
});


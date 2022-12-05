<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProviderController;

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

Route::get('/', function () {
    return view('welcome');
});



Route::view("/login", "pages.login");
Route::post("/login", [AuthenticationController::class, "login"]);

Route::view("/register", "pages.register");
Route::post("/register", [AuthenticationController::class, "register"]);
Route::get("/logout", [AuthenticationController::class, "logout"]);


Route::get("/admin/dashboard", [AdminController::class, "dashboard"]);
Route::get("auth/{provider}", [ProviderController::class, "loginProvider"]);
Route::get("auth/callback/{provider}", [ProviderController::class, "callbackProvider"]);

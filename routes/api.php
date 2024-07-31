<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RestaurantController;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::group([
    "middleware" => "authenticate",
    "prefix" => "restaurants",
    "controller" => RestaurantController::class
], function () {
    Route::get('/', 'getAllRestaurants');
    Route::get('/{id}',  'getRestaurant');
    Route::post('/', 'createRestaurant');
    Route::delete('/{id}',  'deleteRestaurant');
    Route::put('/{id}',  'updateRestaurant');
    Route::get('/menus/{id}', 'restaurantMenus');
});

Route::group([
    'middleware' => "auth.user",
    "prefix" => "menus",
    "controller" => MenuController::class
], function () {;
    // Route::get('/{id}',  'readMenu')->middleware('auth.user');
    Route::get('/{id}',  'readMenu');
    Route::post('/', 'createMenu');
    Route::delete('/{id}',  'deleteMenu');
    Route::put('/{id}',  'updateMenu');
    Route::get('/', 'readAll');
    Route::get('/restau/{id}', 'menuRestaurant');
});

Route::group([
    "middleware" => ["some.middleware", "auth.user"],
], function () {

    Route::apiResource('deliveries', DeliveryController::class);
    Route::get('deliveries/name/{name}', [DeliveryController::class, 'findByName']);
});
Route::apiResource('deliveries', DeliveryController::class)->middleware('some.middleware');
Route::apiResource('notifications', NotificationController::class);
// Route::apiResource('notifications', NotificationController::class)->except('index');

// Route::get('/notifications', [NotificationController::class, "index"])->middleware('some.other.middleware');

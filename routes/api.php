<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/spot', '\App\Http\Controllers\Spot\SpotController@getSpots');
Route::get('/spot/{spotId}/equipment', '\App\Http\Controllers\Spot\EquipmentController@getEquipmentsForSpot');

Route::post('/food-pickup', '\App\Http\Controllers\FoodPickup\FoodPickupController@createFoodPickup');
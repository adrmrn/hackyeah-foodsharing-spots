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

Route::pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');

Route::get('/spot', '\App\Http\Controllers\Spot\SpotController@getSpots');
Route::get('/spot/{uuid}/equipment', '\App\Http\Controllers\Spot\EquipmentController@getEquipmentsForSpot');

Route::post('/food-pickup', '\App\Http\Controllers\FoodPickup\FoodPickupController@createFoodPickup');

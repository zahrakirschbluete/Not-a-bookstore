<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Route::resource('search', 'SearchController');

Route::get('/shop/{item_id}/{amount}', 'ItemController@show');
//Route::get('/shop/{item_id}/{amount}', 'ItemController@search');
//Route::get('/shop', 'ItemController@show');
Route::get('/shop/search', 'ItemController@search');
//Route::get('/shop', 'ItemController@search');
Route::resources([
      // 'items' => 'ItemController',
      // 'shop' => 'ShopController'
      'shop' => 'ItemController'
   ]);
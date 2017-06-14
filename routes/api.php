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



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

/*實際抓取資料庫資料*/
Route::get('real_data', 'ApiController@real')->name('real_data');

/*隨機產生1~50變數*/
Route::get('random_data',function()
{
return ['value' => rand(1,50)];
})->name('random_data');

/*需量設定api*/
Route::get('demand_setting', 'ApiController@demand_setting')->name('demand_setting');

/*取得經緯度*/
Route::get('geocoding', 'ApiController@geocoding')->name('geocoding');

/*取得日出落時間*/
Route::get('suntime', 'ApiController@suntime')->name('suntime');
/*開機設定*/
Route::get('boot', 'ApiController@boot')->name('boot');
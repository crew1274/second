<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*demo測試路徑*/
Route::group(['prefix' => 'demo'], function () {
    Route::get('real', 'RealtimeController@real');
    Route::get('random', 'RealtimeController@random');
    Route::get('/', function () {
    return view('form');
});
});

/*網路設定*/
Route::group(['prefix' => 'network'], function () {
    Route::post('wifi', ['as' => 'network/wifi', 'uses' => 'NetworkController@wifi']);
    Route::post('staticip', ['as' => 'network/staticip', 'uses' => 'NetworkController@staticip']);
    Route::post('dhcp', ['as' => 'network/dhcp', 'uses' => 'NetworkController@dhcp']);
    Route::get('/', 'NetworkController@index');
});
Route::get('test', function(){return view('test'); });
Route::get('/', 'HomeController@index');
Route::get('dashboard', 'DashboardController@index');
Route::get('record', 'RecordController@index');
Route::resource('boot','SettingController');
Route::resource('peaktime','ConfigController');
/*個人資料更新*/
Route::get('profile', 'ProfileController@index');
Route::post('profile/update', 'ProfileController@update');
/*所在地更新*/
Route::get('location', 'LocationController@index');
Route::post('location', 'LocationController@store');
/*需量設定*/
Route::get('demand', 'DemandController@index');
Route::post('demand', 'DemandController@store');

/*卸載群組設定*/
Route::get('offload', 'OffloadController@index');
Route::get('offload/on/{id}', 'OffloadController@on');
Route::get('offload/off/{id}', 'OffloadController@off');

/*即時控制*/
Route::get('control', 'ControlController@index');
Route::post('control/switch', 'ControlController@switch');
Route::get('record', 'TableController@index');
Route::get('documentation', 'DashboardController@documentation');

/*更換語系*/
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

Auth::routes();
#Route::get('/home', 'HomeController@index');

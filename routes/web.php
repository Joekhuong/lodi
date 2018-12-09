<?php

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

Route::get('/idols/follow/{idol_id}', 'IdolsController@follow')->middleware('auth');
Route::get('/idols/unfollow/{idol_id}', 'IdolsController@unfollow')->middleware('auth');

Route::group( [ 'prefix' => 'admin',
    'middleware' => [
           //'auth',
           'isAdmin'
        ]
    ],
    function()
{
    Route::resource('idols', 'IdolsController');
    Route::resource('regions', 'RegionController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
//Route::get('/idols/search', 'HomeController@index')->name('idols_search');

Route::get('/pages/{page_key?}', 'PagesController@index');



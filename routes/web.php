<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/','Site\HomeController@index')->name('home');
Route::post('/login','Site\LoginController@login')->name('login');


//register
Route::get('/register','Site\RegisterController@index')->name('register');
Route::post('/register','Site\RegisterController@register')->name('submit_register');

Route::group(['namespace'=>'Site', 'middleware' => 'logined' ], function() {
    //home
    Route::get('/home','HomeController@homePage')->name('home_page');
    Route::get('/seller_register','HomeController@registerSeler')->name('register_seler');
    Route::get('/logout','LoginController@logout')->name('logout');
    //register seller
    Route::post('/seller_register','HomeController@postRegisterSeler')->name('post_seler_register');
    Route::post('/update-seller','HomeController@updateRegisterSeler')->name('update_seler_register');

    Route::get('/remove-user','HomeController@removeUser')->name('remove_user');

    Route::get('/list-register-seller','HomeController@listRegisterSeller')->name('list_register_seller');
    Route::get('/submit-register-seller','HomeController@submitRegisterSeller')->name('submit_register_seller');
    Route::get('/reject-register-seller','HomeController@rejectRegisterSeller')->name('reject_register_seller');
    
    Route::get('/list-seller','HomeController@listSeller')->name('list_seller');


    

});


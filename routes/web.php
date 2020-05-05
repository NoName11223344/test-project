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
    Route::get('/logout','LoginController@logout')->name('logout');

    //register seller
    Route::get('/seller_register','SellerController@registerSeler')->name('register_seler');
    Route::post('/seller_register','SellerController@postRegisterSeler')->name('post_seler_register');
    Route::post('/update-seller','SellerController@updateRegisterSeler')->name('update_seler_register');
    Route::get('/list-register-seller','SellerController@listRegisterSeller')->name('list_register_seller');
    Route::get('/submit-register-seller','SellerController@submitRegisterSeller')->name('submit_register_seller');
    Route::get('/reject-register-seller','SellerController@rejectRegisterSeller')->name('reject_register_seller');
    Route::get('/list-seller','SellerController@listSeller')->name('list_seller');

    //user
    Route::get('/remove-user','UserController@removeUser')->name('remove_user');


    

});


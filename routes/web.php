<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@home');

//admin route

Route::get('/admin/login', 'Admin\AuthController@showLogin')->middleware('RedirectIfAdminAuth');
Route::post('/admin/login', 'Admin\AuthController@login')->middleware('RedirectIfAdminAuth');


Route::group(['prefix'=>'admin','namespace'=>"Admin",'middleware'=>'RedirectIfNotAdminAuth', 'as'=>'admin'], function(){
    Route::get('/', 'PageController@showDashboard');
    Route::get('/logout', 'AuthController@logout');

    Route::resource('blog', 'BlogController');
});


<?php

use Illuminate\Support\Facades\Route;
$namespace = 'App\\Http\\Controllers\\';

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard'], function () use ($namespace){
    Route::get('login', $namespace.'Auth\LoginController@showLogin');
    Route::post('login_post', $namespace.'Auth\LoginController@login_post');

    Route::group(['middleware' => 'auth'], function () use ($namespace){
        Route::get('/', $namespace.'HomeController@home')->name('home');
        Route::get('logout', $namespace.'Auth\LoginController@logout');

        Route::group(['middleware' => 'checkpermission'], function () use ($namespace){
            Route::resource('roles', $namespace.'RoleController');
            Route::resource('category', $namespace.'CategoryController');
            Route::get('category/delete/{id}', $namespace.'CategoryController@delete');

            Route::resource('sub_category', $namespace.'SubCategoryController');
            Route::get('sub_category/delete/{id}', $namespace.'SubCategoryController@delete');
        });
    });
});

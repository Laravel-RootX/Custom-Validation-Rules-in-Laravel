<?php

use Illuminate\Support\Facades\Route;

Route::resource('/users', 'UserController');
Route::get('/dashboard', 'DashboardController@index');

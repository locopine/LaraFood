<?php

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::resource('plans', 'PlanController');
});

Route::get('/', function () {
    return view('welcome');
});

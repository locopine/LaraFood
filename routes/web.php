<?php

Route::get('admin', 'DashboardController@index')->name('dashboard.index');
Route::resource('admin/plans', 'PlanController');

Route::get('/', function () {
    return view('welcome');
});


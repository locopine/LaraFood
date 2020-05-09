<?php

Route::resource('admin/plans', 'PlanController');

Route::get('/', function () {
    return view('welcome');
});

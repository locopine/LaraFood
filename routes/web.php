<?php

Route::prefix('admin')->namespace('Admin')->group(function () {

    /**
     * Routes Details Plan
     */
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
    Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.delete');
    Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::post('plans/{url}/details/store', 'DetailPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

    /**
     * Routes Plans
     */
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::resource('plans', 'PlanController');
});

Route::get('/', function () {
    return view('welcome');
});

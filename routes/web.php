<?php

Route::prefix('admin')->namespace('Admin')->group(function () {

    /**
     * Routes Plans X Profiles
     */
    Route::get('profiles/{idProfile}/plan/{idPlan}', 'ACL\PlanProfileController@detachPlansProfile')
        ->name('profiles.plans.detach');
    Route::get('plans/{idPlan}/profile/{idProfile}', 'ACL\PlanProfileController@detachPlansProfile')
        ->name('plans.profiles.detach');
    Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachPlanProfile')
        ->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')
        ->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@plans')
        ->name('plans.profiles');
    Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@profiles')
        ->name('profiles.plans');

    /**
     * Routes Permission X Profiles
     */
    Route::get('permissions/{idPermission}/profile/{idProfile}', 'ACL\PermissionProfileController@detachProfilesPermission')->name('permissions.profiles.detach');
    Route::get('profiles/{idProfile}/permission/{idPermission}', 'ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permissions.detach');
    Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
    Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
    Route::get('permissions/{id}/profiles', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');

    /**
     * Routes Profiles
     */
    Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
    Route::resource('permissions', 'ACL\PermissionController');

    /**
     * Routes Profiles
     */
    Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
    Route::resource('profiles', 'ACL\ProfileController');

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
    Route::resource('plans', 'PlanController');

    /**
     * Routes Dashboard
     */
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
});

Route::get('/', function () {
    return view('welcome');
});

<?php

Route::group([
    'prefix' => 'pedagog',
    'as' => 'pedagog.',
    'namespace' => 'Pedagog',
    'middleware' => 'routeNeedsRole:pedagog'
], function () {

    Route::get('dashboard','DashboardController@index')->name('dashboard');
});
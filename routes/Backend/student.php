<?php

Route::group([
    'prefix' => 'student',
    'as' => 'student.',
    'namespace' => 'Student',
    'middleware' => 'routeNeedsRole:student'
], function () {

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('list','DashboardController@dataTable');

});
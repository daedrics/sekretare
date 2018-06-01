<?php

Route::group([
    'prefix' => 'pedagog',
    'as' => 'pedagog.',
    'namespace' => 'Pedagog',
    'middleware' => 'routeNeedsRole:pedagog'
], function () {

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('detyrime', 'DetyrimeController@index')->name('detyrime.index');
    Route::post('detyrime/search', 'DetyrimeController@search')->name('detyrime.search');
    Route::post('detyrime/ploteson/{detyrim}', 'DetyrimeController@ploteso')->name('detyrime.ploteson');
});
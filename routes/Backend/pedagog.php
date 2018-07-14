<?php

Route::group([
    'prefix' => 'pedagog',
    'as' => 'pedagog.',
    'namespace' => 'Pedagog',
    'middleware' => 'routeNeedsRole:pedagog'
], function () {

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    /* detyrim routes */
    Route::get('detyrime', 'DetyrimeController@index')->name('detyrime.index');
    Route::post('detyrime/search', 'DetyrimeController@search')->name('detyrime.search');
    Route::post('detyrime/ploteson/{detyrim}', 'DetyrimeController@ploteso')->name('detyrime.ploteson');

    /* provim routes */
    Route::get('provim', 'ProvimController@index')->name('provim.index');
    Route::post('provim/search', 'ProvimController@search')->name('provim.search');
    Route::post('provim/nota/{student}', 'ProvimController@nota')->name('provim.ploteson');
});
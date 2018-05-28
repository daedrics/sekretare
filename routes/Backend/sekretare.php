<?php

Route::group([
    'prefix' => 'sekretare',
    'as' => 'sekretare.',
    'namespace' => 'Sekretare',
    'middleware' => 'routeNeedsRole:sekretare'
], function () {

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    /*user routes*/
    Route::get('student/list','StudentController@dataTable');
    Route::get('student','StudentController@index')->name('student.index');
    Route::post('student','StudentController@store')->name('student.store');

    Route::get('fakultet/list','FakultetController@dataTable');
    Route::get('fakultet','FakultetController@index')->name('fakultet.index');
    Route::post('fakultet','FakultetController@store')->name('fakultet.store');
    Route::get('fakultet/{fakultet}/edit','FakultetController@edit')->name('fakultet.edit');
    Route::get('fakultet/delete/{fakultet}','FakultetController@destroy')->name('fakultet.destroy');
    Route::put('fakultet/update/{fakultet}','FakultetController@update')->name('fakultet.update');

});
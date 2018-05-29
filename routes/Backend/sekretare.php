<?php

Route::group([
    'prefix' => 'sekretare',
    'as' => 'sekretare.',
    'namespace' => 'Sekretare',
    'middleware' => 'routeNeedsRole:sekretare'
], function () {

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    /* student routes */
    Route::get('student/list','StudentController@dataTable');
    Route::get('student','StudentController@index')->name('student.index');
    Route::post('student','StudentController@store')->name('student.store');
    Route::get('student/{student}/edit','StudentController@edit')->name('student.edit');
    Route::get('student/delete/{student}','StudentController@destroy')->name('student.destroy');
    Route::put('student/update/{student}','StudentController@update')->name('student.update');

    /* fakultet routes */
    Route::get('fakultet/list','FakultetController@dataTable');
    Route::get('fakultet','FakultetController@index')->name('fakultet.index');
    Route::post('fakultet','FakultetController@store')->name('fakultet.store');
    Route::get('fakultet/{fakultet}/edit','FakultetController@edit')->name('fakultet.edit');
    Route::get('fakultet/delete/{fakultet}','FakultetController@destroy')->name('fakultet.destroy');
    Route::put('fakultet/update/{fakultet}','FakultetController@update')->name('fakultet.update');


    /* departament routes */
    Route::get('departament/list','DepartamentController@dataTable');
    Route::get('departament','DepartamentController@index')->name('departament.index');
    Route::post('departament','DepartamentController@store')->name('departament.store');
    Route::get('departament/{departament}/edit','DepartamentController@edit')->name('departament.edit');
    Route::get('departament/delete/{departament}','DepartamentController@destroy')->name('departament.destroy');
    Route::put('departament/update/{departament}','DepartamentController@update')->name('departament.update');


    /* grup mesimor routes */
    Route::get('grupMesimor/list','GrupMesimorController@dataTable');
    Route::get('grupMesimor','GrupMesimorController@index')->name('grupMesimor.index');
    Route::post('grupMesimor','GrupMesimorController@store')->name('grupMesimor.store');
    Route::get('grupMesimor/{grupMesimor}/edit','GrupMesimorController@edit')->name('grupMesimor.edit');
    Route::get('grupMesimor/delete/{grupMesimor}','GrupMesimorController@destroy')->name('grupMesimor.destroy');
    Route::put('grupMesimor/update/{grupMesimor}','GrupMesimorController@update')->name('grupMesimor.update');

});
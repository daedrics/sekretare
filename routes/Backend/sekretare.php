<?php

Route::group([
    'prefix' => 'sekretare',
    'as' => 'sekretare.',
    'namespace' => 'Sekretare',
    'middleware' => 'routeNeedsRole:sekretare'
], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    /* student routes */
    Route::get('student/list', 'StudentController@dataTable');
    Route::get('student', 'StudentController@index')->name('student.index');
    Route::post('student', 'StudentController@store')->name('student.store');
    Route::get('student/{student}/edit', 'StudentController@edit')->name('student.edit');
    Route::get('student/delete/{student}', 'StudentController@destroy')->name('student.destroy');
    Route::put('student/update/{student}/{id}', 'StudentController@update')->name('student.update');

    /* pedagog routes */
    Route::get('pedagog/list', 'PedagogController@dataTable');
    Route::get('pedagog', 'PedagogController@index')->name('pedagog.index');
    Route::post('pedagog', 'PedagogController@store')->name('pedagog.store');
    Route::get('pedagog/{pedagog}/edit', 'PedagogController@edit')->name('pedagog.edit');
    Route::get('pedagog/delete/{pedagog}', 'PedagogController@destroy')->name('pedagog.destroy');
    Route::put('pedagog/update/{pedagog}/{id}', 'PedagogController@update')->name('pedagog.update');

    /* fakultet routes */
    Route::get('fakultet/list', 'FakultetController@dataTable');
    Route::get('fakultet', 'FakultetController@index')->name('fakultet.index');
    Route::post('fakultet', 'FakultetController@store')->name('fakultet.store');
    Route::get('fakultet/{fakultet}/edit', 'FakultetController@edit')->name('fakultet.edit');
    Route::get('fakultet/delete/{fakultet}', 'FakultetController@destroy')->name('fakultet.destroy');
    Route::put('fakultet/update/{fakultet}', 'FakultetController@update')->name('fakultet.update');


    /* departament routes */
    Route::get('departament/list', 'DepartamentController@dataTable');
    Route::get('departament', 'DepartamentController@index')->name('departament.index');
    Route::post('departament', 'DepartamentController@store')->name('departament.store');
    Route::get('departament/{departament}/edit', 'DepartamentController@edit')->name('departament.edit');
    Route::get('departament/delete/{departament}', 'DepartamentController@destroy')->name('departament.destroy');
    Route::put('departament/update/{departament}', 'DepartamentController@update')->name('departament.update');


    /* grup mesimor routes */
    Route::get('grupMesimor/list', 'GrupMesimorController@dataTable');
    Route::get('grupMesimor', 'GrupMesimorController@index')->name('grupMesimor.index');
    Route::post('grupMesimor', 'GrupMesimorController@store')->name('grupMesimor.store');
    Route::get('grupMesimor/{grupMesimor}/edit', 'GrupMesimorController@edit')->name('grupMesimor.edit');
    Route::get('grupMesimor/delete/{grupMesimor}', 'GrupMesimorController@destroy')->name('grupMesimor.destroy');
    Route::put('grupMesimor/update/{grupMesimor}', 'GrupMesimorController@update')->name('grupMesimor.update');

    /* vit akademik routes */
    Route::post('vitAkademik', 'VitAkademikController@store')->name('vitAkademik.store');

    /* lenda routes */
    Route::get('lenda/list', 'LendaController@dataTable');
    Route::get('lenda', 'LendaController@index')->name('lenda.index');
    Route::post('lenda', 'LendaController@store')->name('lenda.store');
    Route::get('lenda/{lenda}/edit', 'LendaController@edit')->name('lenda.edit');
    Route::get('lenda/delete/{lenda}', 'LendaController@destroy')->name('lenda.destroy');
    Route::put('lenda/update/{lenda}', 'LendaController@update')->name('lenda.update');

    /* provim routes */
    Route::get('provim/list', 'ProvimController@dataTable');
    Route::get('provim', 'ProvimController@index')->name('provim.index');
    Route::get('provim/{provim}', 'ProvimController@show')->name('provim.show');
    Route::post('provim', 'ProvimController@store')->name('provim.store');
    Route::get('provim/{provim}/edit', 'ProvimController@edit')->name('provim.edit');
    Route::get('provim/delete/{provim}', 'ProvimController@destroy')->name('provim.destroy');
    Route::put('provim/update/{provim}', 'ProvimController@update')->name('provim.update');


    /* detyrim akademik routes */
    Route::get('detyrimAkademik/list', 'DetyrimAkademikController@dataTable');
    Route::get('detyrimAkademik', 'DetyrimAkademikController@index')->name('detyrimAkademik.index');
    Route::post('detyrimAkademik', 'DetyrimAkademikController@store')->name('detyrimAkademik.store');
    Route::get('detyrimAkademik/{detyrimAkademik}/edit', 'DetyrimAkademikController@edit')->name('detyrimAkademik.edit');
    Route::get('detyrimAkademik/delete/{detyrimAkademik}', 'DetyrimAkademikController@destroy')->name('detyrimAkademik.destroy');
    Route::put('detyrimAkademik/update/{detyrimAkademik}', 'DetyrimAkademikController@update')->name('detyrimAkademik.update');
});
<?php

// Site
Route::get('/', 'HomeController@index')->name('home');

Route::get('avatar', 'UsersController@avatar')->name('avatar');
Route::get('image/external', 'ImagesController@image')->name('image');

Route::get('jogar/contra-o-tempo', 'PlayController@play')->name('playTime');
Route::get('jogar', 'PlayController@play')->name('play');
Route::get('jogar/{slug}', 'PlayController@playNow')->name('playNow');

Route::post('jogar/letra', 'PlayController@submitLetter')->name('submitLetter');


Route::get('ranking', 'RankingController@rankingHome')->name('ranking');

Auth::routes();
Route::post('/usuario-login', 'Auth\CustomLoginController@login')->name('custom-login');
Route::post('/usuario-logout', 'Auth\CustomLoginController@logout')->name('custom-logout');
Route::post('/usuario-register', 'Auth\CustomRegisterController@register')->name('custom-register');

Route::middleware('auth')->group(function() {

	Route::prefix('admin')->middleware('role:administrador')->group(function() {

		Route::middleware('lock')->group(function() {

			Route::get('home', 'AdminController@index');
			Route::get('/', 'AdminController@index')->name('admin');

			Route::resource('categorias', 'CategorieController');
			Route::resource('palavras', 'WordController');
			Route::resource('ranking', 'RankingController');
			Route::resource('users', 'UsersController');
			
			Route::get('aparencia', 'AppearanceController@index')->name('appearance');
			Route::resource('configs', 'ConfigController');
			Route::resource('permissoes', 'PermissoesController');
			Route::resource('roles', 'RolesController');
			Route::get('roles/{id}/permissoes', 'RolesController@permissoes')->name('role_permissoes');
			Route::post('roles/permissoes/store', 'RolesController@permissoesStore')->name('role_permissoes_store');

		});

		Route::get('lockscreen', 'LockAccountController@lockscreen')->name('lockscreen');
		Route::post('lockscreen', 'LockAccountController@unlock')->name('post_lockscreen');

	});
});
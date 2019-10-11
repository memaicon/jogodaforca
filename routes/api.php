<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function(){
    Route::get('palestrantes', function(){
        return \App\Models\Speaker::with('image')->get();
    });

    Route::get('palestrantes/{id}', function($id){
        return \App\Models\Speaker::findOrFail($id)->with('image')->get();
    });

    Route::get('cronograma', function(){
        return \App\Models\Schedule::with('items')->get();
    });

    Route::get('/image/external', 'ImagesController@image')->name('image');
});
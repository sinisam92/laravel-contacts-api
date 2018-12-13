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
// globalno dodaje hedere nije preporucljivo
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: PUT, GET,POST,DELETE,OPTIONS');
// header('Access-Control-Allow-Headers: Content-Type, Accept,Origin');

Route::group([
    'prefix' => 'auth',
    'namespace' => 'Auth'
], function() {
    Route::post('login', 'AuthController@login');
});

Route::middleware('auth:api')->group(function() {

    Route::resource('contacts', ContactsController::class)->except([
        'create', 'edit'
    ]);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('contacts', 'ContactsController@index');

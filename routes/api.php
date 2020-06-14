<?php

use App\Http\Controllers\API\ProjectsController as ProjectsController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//$version1API = function() {
//    Route::middleware('auth:api', 'throttle:60,1')->group(function () {

    Route::get('projects', 'API\ProjectsController@index')->name('project');
//    });
//};
//Route::group(['prefix' => 'api/latest'], $version1API);



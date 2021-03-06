<?php


//\App\Project::created(function ($project) {
//    \App\Activity::create([
//        'project_id' => $project->id,
//        'description' => 'created'
//    ]);
//});
//
//\App\Project::updated(function ($project) {
//    \App\Activity::create([
//        'project_id' => $project->id,
//        'description' => 'updated'
//    ]);
//
//});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/projects/create', 'ProjectsController@create');
    Route::post('/projects','ProjectsController@store');
    Route::get('/projects', 'ProjectsController@index');
    Route::get('projects/{project}', 'ProjectsController@show');
    Route::get('projects/{project}/edit', 'ProjectsController@edit');
    Route::patch('projects/{project}', 'ProjectsController@update');
    Route::delete('projects/{project}', 'ProjectsController@delete');
    Route::post('projects/{project}/tasks', 'ProjectTasksController@store');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::patch('/projects/{project}/tasks/{task}', 'ProjectTasksController@update');
});

Auth::routes();



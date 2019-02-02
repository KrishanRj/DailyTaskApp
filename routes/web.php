<?php

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
use App\Task;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    $data = Task::all();
    return view('tasks')->with('tasks',$data);
});

Route::post('/saveTask', 'TaskController@store');

Route::get('/markAsCompleted/{id}', 'TaskController@updateTaskAsCompleted');
Route::get('/markAsNotCompleted/{id}', 'TaskController@updateTaskAsNotCompleted');
Route::get('/deleteTask/{id}', 'TaskController@deleteTask');

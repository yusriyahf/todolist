<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Controllers\TodoController;


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

Route::post('someurl', [TodoController::class, "someMethod"]);
Route::get('someurl', [TodoController::class, "get"]);

Route::get('/', function () {
    $task = Task::all();


    return view('index', [
        'tasks' => $task
    ]);
});

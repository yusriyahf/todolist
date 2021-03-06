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
Route::get('/', [TodoController::class, "get"]);
Route::delete('/task/{id}', function ($id) {
    $task = Task::findOrFail($id);

    $task->isDeleted = TRUE;
    $task->save();

    return redirect('/');
});

Route::get('/search/{val}', function ($val) {
    $task = Task::where([
        ['title', 'LIKE', '%' . $val . '%'],
        ['isDeleted', '==', FALSE],
    ])->get();

    return json_encode($task);
});

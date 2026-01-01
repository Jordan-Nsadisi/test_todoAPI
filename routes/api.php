<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return 'API is running';
});

//public auth
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

//protected auth
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    //user profile
    Route::get('/user/profile', [UserController::class, 'getProfile']);

    //crud des tâches
    Route::get('/tasks', [TasksController::class, 'index']);
    Route::post('/tasks', [TasksController::class, 'store']);
    Route::put('/tasks/{id}', [TasksController::class, 'update']);
    Route::delete('/tasks/{id}', [TasksController::class, 'destroy']);

    //get tasks by user
    Route::get('/tasks/user/{userId}', [TasksController::class, 'getTasksByUserId']);
});

// Route::get('/', function (HttpRequest $request) {

//     return [
//         "url" => request()->url(),
//         'data' => 'API'
//     ];
// });

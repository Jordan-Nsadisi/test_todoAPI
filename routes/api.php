<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/', function () {
    return 'API';
});

//public auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//protected auth
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Route::get('/', function (HttpRequest $request) {

//     return [
//         "url" => request()->url(),
//         'data' => 'API'
//     ];
// });

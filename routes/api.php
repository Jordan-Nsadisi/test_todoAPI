<?php

use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/', function () {
    return 'API';
});

// Route::get('/', function (HttpRequest $request) {

//     return [
//         "url" => request()->url(),
//         'data' => 'API'
//     ];
// });

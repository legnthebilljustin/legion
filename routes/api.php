<?php

use App\Http\Controllers\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/testing', [DataController::class, 'testing']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/connection-test', function() {
    return response('you are connected');
});
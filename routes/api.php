<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\Megatalking\AuthController;
use App\Http\Controllers\Megatalking\UsersController;
use App\Http\Controllers\Persona\AccountsController;


// Route::post('/testing', [DataController::class, 'testing']);

Route::controller(Authentication::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});


Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('/user')->group(function() {
        Route::patch('update/{id}', [Authentication::class, 'update']);
        Route::delete('logout/{id}', [Authentication::class, 'logout']);
    });
    
    Route::resource('/accounts', AccountsController::class);
});

Route::prefix('/megatalking')->group(function() {
    Route::post('/login', [AuthController::class, 'login']);

    Route::resource('/users', UsersController::class);
});


Route::get('/connection-test', function() {
    return response('you are connected');
});
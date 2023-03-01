<?php

use App\Http\Controllers\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\Persona\AccountsController;
use App\Models\User;

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

});


Route::get('/connection-test', function() {
    return response('you are connected');
});
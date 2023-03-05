<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\Megatalking\AuthController;
use App\Http\Controllers\Megatalking\CoursesController;
use App\Http\Controllers\Megatalking\UsersController;
use App\Http\Controllers\Megatalking\VideoMaterial\ContentsController;
use App\Http\Controllers\Megatalking\VideoMaterial\TipsController;
use App\Http\Controllers\Megatalking\VideoMaterial\UnitsController;
use App\Http\Controllers\Megatalking\VideoMaterial\VideosController;
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

    Route::middleware('auth:sanctum')->group(function() {
        Route::resource('/users', UsersController::class)->middleware(['ability:users:*']);

        Route::resource('/courses', CoursesController::class)->except(['show']);

        Route::prefix('/videomaterial')->group(function() {
            Route::resource('/units', UnitsController::class);
            Route::resource('/videos', VideosController::class);
            Route::resource('/contents', ContentsController::class);
            Route::resource('/tips', TipsController::class)->except(['show']);
        });
        Route::prefix('/pagoda')->group(function() {

        });
        Route::prefix('/webbooks')->group(function() {

        });
    });
});


Route::get('/connection-test', function() {
    return response('you are connected');
});
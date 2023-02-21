<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();
        Response::macro('success', function($data = '', $message = '') {
            return response()->json([
                'data' => $data,
                'message' => $message
            ], 200);
        });

        Response::macro('error', function ($message, $code) {
            return response()->json([
                'message' => $message
            ], $code);
        });
    }
}

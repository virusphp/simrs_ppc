<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        $factory->macro('jsonApi', function($code = 200, $message = '', $data = null) use ($factory) {
            $format = [
                'code' => $code,
                'message' => $message,
                'result' => $data
            ];

            return $factory->make($format);
        });
    }
}

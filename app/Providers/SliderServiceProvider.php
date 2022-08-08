<?php

namespace App\Providers;

use App\Repositories\SliderRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use phpDocumentor\Reflection\Types\This;

class SliderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('SliderRepository', function () {
            return new SliderRepository;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

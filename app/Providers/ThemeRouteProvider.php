<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 6/28/2019
 * Time: 12:41 AM
 */

namespace App\Providers;

use function foo\func;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\View;

class ThemeRouteProvider extends ServiceProvider
{



    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
//    protected $namespace = 'App\Themes\Main\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $currentNameSpace = (config("themes.current"));
        $currentNameSpace = 'App\\Themes\\' . $currentNameSpace . '\\Controllers';
        $this->namespace = $currentNameSpace;
        // add theme view path
        $path = base_path("app/Themes/") . config("themes.current") . "/views";
        $this->loadViewsFrom($path, "home");
        parent::boot();

    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/Themes/' . config("themes.current") . '/routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('app/Themes/' . config("themes.current") . '/routes/api.php'));
    }


}

<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 6/28/2019
 * Time: 12:41 AM
 */

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
class PluginRouteProvider extends ServiceProvider
{

//    protected $namespace = 'App\Themes\Main\Controllers';

    public function boot()
    {

       if(Cache::has("site_plugin")===false){
        $plugin=DB::table("tools")->where("type","=","plugin")
            ->where("is_active","=","1")
            ->get();
        Cache::forever("site_plugin",$plugin);
       }
        foreach (Cache::get("site_plugin") as $item) {

            $currentNameSpace = 'App\\Plugins\\' . $item->name . '\\Controllers';
            $controller_path=app_path('Plugins/' . $item->name . '/Controllers');

            if(File::isDirectory($controller_path)) {
                $this->namespace = $currentNameSpace;
                $configFile= app_path("Plugins/$item->name/config.php");
               if (file_exists($configFile))
               {
                   include_once "$configFile";
               }
                // add theme view path
                $path = app_path("Plugins/") . $item->name . "/view";
                if (File::isDirectory($path)) {
                    $this->loadViewsFrom($path, "$item->name");

                }
            }

        }
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
        foreach (Cache::get("site_plugin") as $item) {
            $path = app_path('Plugins/' . $item->name . '/routes/web.php');
            if (file_exists($path)) {
                $currentNameSpace = 'App\\Plugins\\' . $item->name . '\\Controllers';
                // add theme view path
                Route::middleware('web')
                    ->namespace($currentNameSpace)
                    ->group($path);
            }
        }
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
        foreach (Cache::get("site_plugin") as $item) {
            $path = app_path('Plugins/' . $item->name . '/routes/api.php');
            if (file_exists($path)) {
                $currentNameSpace = 'App\\Plugins\\' . $item->name . '\\Controllers';
                // add theme view path
                Route::prefix('api')
                    ->middleware('api')
                    ->namespace($currentNameSpace)
                    ->group($path);
            }
        }
    }


}

<?php


namespace App\Http\Middleware;


use Closure;
use App;
use Config;

class LanguageMiddleware
{
    protected $languages = ['en', 'tr', 'ru', 'fr', 'de', 'fa', 'ar'];

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $params = explode('/', request()->path());

        $language = $params[0];

        if (in_array($language, $this->languages)) {
            //return redirect(app()->getLocale() . '/' . request()->path(), 301);
            app()->setLocale($language);
        }

        return $next($request);
    }

}

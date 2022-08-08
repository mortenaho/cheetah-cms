<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/29/2019
 * Time: 8:15 PM
 */

namespace App\Helpers;


use Illuminate\View\View;

class Errors
{
    public static function Abort($status,$message, $controller = "home")
    {
        switch ($status) {
            case 404:
                return view()->make("{$controller}.errors.404",compact('message'))->render();
                break;
            case 403:
                return view()->make("{$controller}.errors.403",compact('message'))->render();
                break;
            case 500:
                return view()->make("{$controller}.errors.500",compact('message'))->render();
                break;
            case 503:
                return view()->make("{$controller}.errors.503",compact('message'))->render();
                break;
            default:
                return view()->make("{$controller}.errors.404",compact('message'))->render();
                break;
        }
    }
}

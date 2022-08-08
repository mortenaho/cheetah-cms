<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 11:01 PM
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class SliderRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "SliderRepository";
    }
}

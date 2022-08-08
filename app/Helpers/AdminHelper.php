<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 10:24 PM
 */

class AdminHelper
{
    public static function adminAlert($message, $type)
    {
        return view()
            ->make("admin.shared._admin_alert", compact('message', 'type'))
            ->render();
    }

    public static function TempData($key, $value = null)
    {
        $result = "";
        if ($value == null) {
            if (session()->has("$key")) {
                $result = session()->get("$key");
                session()->forget($key);
            }
        } else {
            session()->put($key, $value);
            $result = session()->get("$key");
        }
        return $result;
    }

    public static function helpBlock($type)
    {
        $message = "";
        if ($type == "image")
            $message = " <span class=\"help-block\">" . HelpImageUpload . "</span>";
        return $message;
    }

    public static function add_dashboard($item)
    {
        array_push($GLOBALS["dashboard"], $item);
    }
    public static function get_dashboard($item=null)
    {
       return (object)$GLOBALS["dashboard"];
    }
}

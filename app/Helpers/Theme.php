<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 4/8/2019
 * Time: 4:36 PM
 */

namespace App\Helpers;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use TheSeer\Tokenizer\Exception;
use ZipArchive;


class Theme
{
    public $CurrentTheme = "";

    public function __Construct()
    {
        $this->CurrentTheme = config("themes.current");
        //View::addLocation(public_path("themes"));

    }

    public function set($name)
    {
        changeEnv(['THEMES_CURRENT' => $name]);
    }


    public function get()
    {
        return $this->CurrentTheme;
    }

    public function view($name, $data = null)
    {
        if (isset($data))
            return view( $this->CurrentTheme . ".$name", $data);
        else
            return view( $this->CurrentTheme . ".$name");
    }

    public function viewToString($name, $data = null)
    {
        if (isset($data))
            return View::make($this->CurrentTheme . ".$name", $data)->render();
        else
            return View::make( $this->CurrentTheme . ".$name")->render();
    }

    public function all()
    {
        $info = [];
        $themePath = app_path("Themes");
        $dirThemes = $scanned_directory = array_diff(scandir($themePath), array('..', '.'));
        foreach ($dirThemes as $item) {
            $file = file_get_contents(app_path("Themes") . "/$item/theme.json");
            $themeInfo = json_decode($file);
            array_push($info, $themeInfo);
        }
        return $info;
    }

    public function info($name = null)
    {
        if ($name == null) $name = $this->get();
        $file = file_get_contents(app_path("Themes") . "/$name/theme.json");
        return json_decode($file);
    }

    public function getViewPath($name=null)
    {
        return isset($name) ?$this->CurrentTheme.".$name": $this->CurrentTheme;
    }
    public function getAsset()
    {
        return  url("app/Themes/" . $this->CurrentTheme);
    }

    public function remove($name)
    {
        if ($name != null && $name != $this->get()) {
            $themePath = public_path("themes") . "/$name";
            if (File::isDirectory("$themePath")) {
                File::deleteDirectory(public_path("themes") . "/$name");
            }
        }
    }

    public function extract($path, $to)
    {
        $zip = new ZipArchive();
        if ($zip->open($path) === true) {
            $zip->extractTo($to);
            $zip->close();
            return "عملیات استخراج فایل ها با موفقیت انجام شد.";
        } else {
            return "این فایل را نمیتواند استخراج کند .";
        }
    }
}



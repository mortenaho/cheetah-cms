<?php

use App\Helpers\Theme;

/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 4/10/2019
 * Time: 5:18 PM
 */
function changeEnv($data = array())
{
    if (count($data) > 0) {

        // Read .env-file
        $env = file_get_contents(base_path() . '/.env');

        // Split string on every " " and write into array
        $env = preg_split('/\s+/', $env);;

        // Loop through given data
        foreach ((array)$data as $key => $value) {

            // Loop through .env-data
            foreach ($env as $env_key => $env_value) {

                // Turn the value into an array and stop after the first split
                // So it's not possible to split e.g. the App-Key by accident
                $entry = explode("=", $env_value, 2);

                // Check, if new key fits the actual .env-key
                if ($entry[0] == $key) {
                    // If yes, overwrite it with the new one
                    $env[$env_key] = $key . "=" . $value;
                } else {
                    // If not, keep the old one
                    $env[$env_key] = $env_value;
                }
            }
        }

        // Turn the array back to an String
        $env = implode("\n", $env);

        // And overwrite the .env with the new data
        file_put_contents(base_path() . '/.env', $env);

        return true;
    } else {
        return false;
    }
}

function theme_view($name)
{
    $theme = new Theme();
    return isset($name) ? $theme->getViewPath($name) : $theme->getViewPath();
}

function theme_asset_url($file = null)
{
    $theme = new Theme();
    if (isset($file))
        return $theme->getAsset() . "/$file";
    else
        return $theme->getAsset();
}

function theme_name()
{
    $theme = new Theme();

    return $theme->get();
}

function theme_view_toString($name, $arg)
{
    $theme = new Theme();

    return $theme->viewToString($name, $arg);
}

function get_post_meta($collection, $key)
{

    $post_meta = isset($collection) ? collect($collection) : null;

    if ($post_meta == null) return "";
    if ($post_meta != null)
        return isset($post_meta->firstWhere("meta_key", "$key")->meta_value) ? $post_meta->firstWhere("meta_key", "$key")->meta_value : "";
    else return "";
}

function MiladiToShamsi($date)
{
    $yer=substr($date,0,4);
    $month=substr($date,5,2);
    $day=substr($date,8,2);
    return gregorian_to_jalali($yer,$month,$day,"-");
}

function puid()
{
    $code = date("hymdsm");
    return $code;
}

function create_url_slug($string)
{
    $slug = str_replace(' ', '-', $string);
    return $slug;
}

function remove_url_slug($string)
{
    $slug = str_replace('-', ' ', $string);
    return $slug;
}

function timeStampToPersian($date)
{
    $date = explode('-', $date);

    if (str_start($date[1], "0"))
        $date[1] = substr($date[1], 1, 1);
    if (str_start($date[2], "0"))
        $date[2] = substr($date[2], 1, 1);
    $date = gregorian_to_jalali(trim($date[0]), $date[1], $date[2], '/');
    return $date;
}

function theme_assets($file)
{
    echo "/Themes/".config("themes.current")."/$file";
}

function theme_thumb_address($file,$folder)
{
    echo "/Themes/".$folder."/$file";
}

function plugin_assets($file)
{
    echo "/bagheera/plugin/$file";
}
function site_setting($key, $value = null)
{
    if (isset($value)) {
        if (cache()->has($key)) {
            cache()->delete($key);
        }
        cache()->forever($key, $value);
    }
    if (isset($key) && !isset($value)) {
        if (cache()->has($key)) {
            $data = cache($key);
            return $data;
        }
    }


}

function faNumberToEn($input)
{
    $unicode = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    $english = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $string = str_replace($unicode, $english, $input);
    return $string;
}
function ResToModel($data){
   $obj=[];
    $data = isset($data) ? collect($data) : null;
   foreach ($data as $item){
       $obj["$item->meta_key"]=$item->meta_value;
   }
    return $obj;
}

function encryptData($key, $data){
//    $iv = random_bytes(16);
//    $ciphertext = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
//    $ivCiphertext = $iv . $ciphertext;
//    $encryptedData = base64_encode($ivCiphertext);
    $encryptedData=openssl_encrypt($data,"AES-128-ECB",$key);
    return $encryptedData;
}

function decryptData($key, $encryptedData){
//    $ivCiphertext  = base64_decode($encryptedData);
//    $iv = substr($ivCiphertext, 0, 16);
//    $ciphertext = substr($ivCiphertext, 16);
//    $decryptedData = openssl_decrypt($ciphertext, "aes-256-cbc", $key, OPENSSL_RAW_DATA, $iv);
//
    $decryptedData=openssl_decrypt($encryptedData,"AES-128-ECB",$key);
    return $decryptedData;
}


<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 6/29/2019
 * Time: 10:53 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CoreController extends Controller
{
    private $file_path;

    public function __construct()
    {
        if (request()->is('bagheera/theme/*')) {
            $delimiter = 'bagheera/theme/';
            $url = urldecode(request()->url());
            $external_path = substr($url, strpos($url, $delimiter) + strlen($delimiter));

            $this->file_path = base_path('app/Themes/' . config("themes.current") . '/' . $external_path);
            if (!file_exists($this->file_path))
                $this->file_path = base_path('app/Themes/' . $external_path);
        }
        if (request()->is('bagheera/plugin/*')) {
            $delimiter = 'bagheera/plugin/';
            $url = urldecode(request()->url());
            $external_path = substr($url, strpos($url, $delimiter) + strlen($delimiter));
            $this->file_path = base_path('app/Plugins/' . $external_path);
        }


    }


    /**
     * Get file from custom directory by route.
     *
     * @param string $file_name
     * @return string
     */
    public function getFile(Request $request, $base_path, $file_name)
    {
        if (File::extension($file_name) != null) {
            $request->request->add(['type' => 'Files']);
            return $this->responseImageOrFile();
        }
    }

    private function responseImageOrFile()
    {
        $file_path = $this->file_path;
        if (!File::exists($file_path)) {
            abort(404);
        }
        $file = File::get($file_path);
        $type = $this->mime_content_type($file_path);
        $response = Response::make($file);
        $response->header('Content-Type', $type);

        return $response;
    }


    function mime_content_type($filename)
    {

        $mime_types = array(

            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',

            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',

            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',

            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',

            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );

        $ext = strtolower($mime_type = File::extension($filename));
        if (array_key_exists($ext, $mime_types)) {
            return $mime_types[$ext];
        } else {
            return 'application/octet-stream';
        }
    }
}

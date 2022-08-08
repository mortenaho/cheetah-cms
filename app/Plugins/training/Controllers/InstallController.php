<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 8/17/2019
 * Time: 11:25 PM
 */

namespace App\Plugins\product\Controllers;


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InstallController
{
    public function install()
    {
        if (!Schema::hasTable("")) {
            Schema::create("tbl", function (Blueprint $table) {
                $table->string("title");
                $table->primary("id");

            });
        }
    }

    public function uninstall()
    {
        if (!Schema::hasTable("")) {
            Schema::drop("tbl");
        }
    }
}

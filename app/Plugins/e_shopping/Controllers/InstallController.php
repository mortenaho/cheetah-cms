<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 8/17/2019
 * Time: 11:25 PM
 */

namespace App\Plugins\e_shopping\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InstallController extends Controller
{
    public function install()
    {

        if (!Schema::hasTable("ec_category")) {
            Schema::create("ec_category", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->string("icon")->nullable(true);
                $table->string("title");
                $table->integer("parent")->nullable(true);
                $table->boolean("has_child")->nullable(true);
                $table->string("path")->nullable(true);
                $table->timestamp("created_at")->nullable(true);
                $table->timestamp("updated_at")->nullable(true);

            });
        }
        if (!Schema::hasTable("ec_property_group")) {
            Schema::create("ec_property_group", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->integer("ec_category_id");
                $table->string("title");



            });
        }

        if (!Schema::hasTable("ec_property")) {
            Schema::create("ec_property", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->string("title");
                $table->integer("property_group_id");


            });
        }


        if (!Schema::hasTable("ec_property_value")) {
            Schema::create("ec_property_value", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->string("title");
                $table->string("value");
                $table->integer("property_id");


            });
        }


        if (!Schema::hasTable("ec_option")) {
            Schema::create("ec_option", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->string("title");


            });
        }
        if (!Schema::hasTable("ec_option_value")) {
            Schema::create("ec_option_value", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->primary("option_id");
                $table->string("value");


            });
        }
        if (!Schema::hasTable("ec_product_option")) {
            Schema::create("ec_product_option", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->string("title")->nullable(true);
                $table->string("value")->nullable(true);
                $table->integer("product_id");
                $table->integer("option_value_id");
                $table->float('amount')->nullable(true);
                $table->string('amount_type')->nullable(true); //price or percent
            });
        }


        if (!Schema::hasTable("ec_suppliers")) {
            Schema::create("ec_suppliers", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->string("company_name")->nullable(true);
                $table->string("contact_name")->nullable(true);
                $table->string("contact_title")->nullable(true);
                $table->string("address")->nullable(true);
                $table->string("city")->nullable(true);
                $table->string("province")->nullable(true);
                $table->string("state")->nullable(true);
                $table->string("postal_code")->nullable(true);
                $table->string("phone")->nullable(true);
                $table->string("fax")->nullable(true);
                $table->string("email")->nullable(true);
            });
        }

        if (!Schema::hasTable("ec_shipping")) {
            Schema::create("ec_shipping", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->string("company_name")->nullable(true);
                $table->string("contact_name")->nullable(true);
                $table->string("contact_title")->nullable(true);
                $table->string("address")->nullable(true);
                $table->string("city")->nullable(true);
                $table->string("province")->nullable(true);
                $table->string("state")->nullable(true);
                $table->string("postal_code")->nullable(true);
                $table->string("phone")->nullable(true);
                $table->string("fax")->nullable(true);
            });
        }


        if (!Schema::hasTable("ec_weight_class")) {
            Schema::create("ec_weight_class", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->string("name")->nullable(true);
                $table->boolean("status")->nullable(true);

            });
        }
        if (!Schema::hasTable("ec_weight_class_description")) {
            Schema::create("ec_weight_class_description", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->integer("weight_class_id");
                $table->integer("title");
                $table->string("unit");
                $table->boolean("status");

            });
        }

        if (!Schema::hasTable("ec_length_class")) {
            Schema::create("ec_length_class", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->string("name")->nullable(true);
                $table->boolean("status")->nullable(true);

            });
        }
        if (!Schema::hasTable("ec_length_class_description")) {
            Schema::create("ec_length_class_description", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->integer("length_class_id");
                $table->integer("title")->nullable(true);
                $table->string("unit")->nullable(true);
                $table->boolean("status")->nullable(true);

            });
        }

        if (!Schema::hasTable("ec_product")) {
            Schema::create("ec_product", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->string("title")->nullable(true);
                $table->string("description")->nullable(true);
                $table->string("content")->nullable(true);
                $table->string("thumb")->nullable(true);
                $table->float("price")->nullable(true);
                $table->float("stock")->nullable(true);
                $table->string("keywords")->nullable(true);
                $table->string("author_id");
                $table->integer("category_id");
                $table->decimal("width")->nullable(true);
                $table->decimal("height")->nullable(true);
                $table->decimal("length")->nullable(true);
                $table->decimal("length_class_id")->nullable(true);
                $table->decimal("weight")->nullable(true);
                $table->decimal("weight_class_id")->nullable(true);
                $table->decimal("is_downloadable")->nullable(true);
                $table->boolean("status")->nullable(true);


            });
        }

        if (!Schema::hasTable("ec_product_download")) {
            Schema::create("ec_product_download", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->integer("product_id");
                $table->boolean("status");

            });
        }
        if (!Schema::hasTable("ec_product_download_content")) {
            Schema::create("ec_product_download_content", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->string("download_id");
                $table->string("title")->nullable(true);
                $table->string("logo")->nullable(true);
                $table->string("file")->nullable(true);
                $table->boolean("status")->nullable(true);

            });
        }

        if (!Schema::hasTable("ec_product_supplier")) {
            Schema::create("ec_product_supplier", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->string("product_id");
                $table->string("supplier_id");
                $table->string("in_stock");
                $table->string("price")->nullable(true);
                $table->boolean("status")->nullable(true);

            });
        }

        if (!Schema::hasTable("ec_price_history")) {
            Schema::create("ec_price_history", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->string("product_id")->nullable(true);
                $table->string("price")->nullable(true);
                $table->string("price_datetime")->nullable(true);
                $table->boolean("status")->nullable(true);


            });
        }

        if (!Schema::hasTable("ec_product_meta")) {
            Schema::create("ec_product_meta", function (Blueprint $table) {
                $table->integer("id")->autoIncrement()->primary();
                $table->string("product_id")->nullable(true);
                $table->string("name")->nullable(true);
                $table->string("value")->nullable(true);
                $table->boolean("status")->nullable(true);

            });
        }


    }

    public function uninstall()
    {
//        if (!Schema::hasTable("")) {
//            Schema::drop("tbl");
//        }
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Plugins\e_shopping\repository;


use App\Models\Category;
use App\Plugins\e_shopping\Model\EC_CategoryModel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class EC_CategoryRepository extends EC_CategoryModel
{
    public function insert($data)
    {
        try {
            // $data["ordering"] = $this->ordering();
            //   $data["url_slug"] = create_url_slug($data["title"]);
            $data["has_child"] = 0;
            $category = EC_CategoryModel::query()->insertGetId($data);
            if ($data["parent"] > 0)
                $this->hasChildSet($data["parent"], 1);
            return $category;
        } catch (QueryException $exp) {
            dd($exp);
            return $exp;
        }
    }

    public function edit($data, $id)
    {
        try {
            $data["id"] = $id;
            //$data["url_slug"] = create_url_slug($data["title"]);
            if ($data["parent"] > 0)
                $this->hasChildSet($data["parent"], 1);
            return EC_CategoryModel::query()->where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function DeleteCategory($id)
    {
        try {
            $category = EC_CategoryModel::query()->find($id);
            if (EC_CategoryModel::query()->where("id", "=", $id)->where("has_child", "=", "0")->delete()) {
                $this->checkHasChild($category->parent);
                return 1;
            } else {
                return -1;
            }
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function ChangeStatus($id)
    {
        try {
            $category = EC_CategoryModel::query()->find($id);
            $category->status = !$category->status;
            return $category->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function ordering()
    {
        try {
            $category = EC_CategoryModel::query()->max("ordering");
            if ($category == null || $category === 0) $category = 0;
            else $category += 1;
            return $category;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function getAll()
    {
        try {
            $category = DB::table("ec_category")->get();
            return $category;
        } catch (QueryException $exp) {
            return $exp;
        }
    }


    public function hasChildSet($id, $value)
    {
        try {
            $category = EC_CategoryModel::query()->where("id", "=", "$id")->update(["has_child" => "$value"]);
            return $category;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function checkHasChild($id)
    {
        try {
            $count = EC_CategoryModel::query()->where("parent", $id)->count();
            if ($count > 0) {
                EC_CategoryModel::query()->where("id", "=", "$id")->update(["has_child" => "1"]);
            } else {
                EC_CategoryModel::query()->where("id", "=", "$id")->update(["has_child" => "0"]);
            }
            return $count;
        } catch (QueryException $exp) {
            return $exp;
        }
    }
}

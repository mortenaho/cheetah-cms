<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class CategoryRepository extends Category
{
    public function insert($data)
    {
        try {
            $data["ordering"] = $this->ordering();
            $data["url_slug"] = create_url_slug($data["title"]);
            $data["has_child"] = 0;
            $category = Category::create($data);
            if ($category->parent > 0)
                $this->hasChildSet($category->parent, 1);
            return $category->id;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function updatings($data, $id)
    {
        try {
            $data["id"] = $id;
            $data["url_slug"] = create_url_slug($data["title"]);
            if ($data["parent"] > 0)
                $this->hasChildSet($data["parent"], 1);
            return Category::where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function DeleteCategory($id)
    {
        try {
            $category = Category::find($id);
            if (Category::where("id", "=", $id)->where("has_child", "=", "0")->delete()) {
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
            $category = Category::find($id);
            $category->status = !$category->status;
            return $category->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function ordering()
    {
        try {
            $category = Category::max("ordering");
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

            $category=DB::table("category")
                ->join("tools","tools.name","category.type")
                ->where("tools.has_category",1)
                ->where("tools.is_active",1)
                ->get();
            return $category;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function getByType($type)
    {
        try {
            $category = Category::where("type", "=", "$type")->get();
            return $category;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function hasChildSet($id, $value)
    {
        try {
            $category = Category::where("id", "=", "$id")->update(["has_child" => "$value"]);
            return $category;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function checkHasChild($id)
    {
        try {
            $count = Category::where("parent", $id)->count();
            if ($count > 0) {
                Category::where("id", "=", "$id")->update(["has_child" => "1"]);
            } else {
                Category::where("id", "=", "$id")->update(["has_child" => "0"]);
            }
            return $count;
        } catch (QueryException $exp) {
            return $exp;
        }
    }
}

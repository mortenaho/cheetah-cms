<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\Menu;
use Illuminate\Database\QueryException;


class MenuRepository extends Menu
{
    public function insert($data)
    {
        try {
            $data["ordering"] = $this->ordering($data["parent"], $data["language"]);
            $data["url_slug"] = str_slug($data["title"]);
            $data["has_child"] = 0;
            $menu = Menu::create($data);
            if ($data["parent"] > 0)
                $this->checkHasChild($data["parent"]);
            if ($menu->parent > 0)
                $this->hasChildSet($menu->parent, 1);
            $data["id"] = $menu->id;
            return $data;
        } catch (QueryException $exp) {
            return $exp;
        }
    }


    public function bulkInsert($menus,$lang)
    {
        try {
            $data=[];
            foreach($menus as $menu) {
                $data[] = [
                    'id' =>  $menu->id,
                    'title' =>  $menu->title,
                    'url_slug' => $menu->url_slug,
                    'link_address' => $menu->link_address,
                    'breadcrumb' => $menu->breadcrumb,
                    'type' => $menu->type,
                    'type_id' => $menu->type_id,
                    'parent' => $menu->parent,
                    'ordering' => $menu->ordering,
                    'has_child' => $menu->has_child,
                    'created_at' => $menu->created_at,
                    'updated_at' => $menu->updated_at,
                    'language' => $menu->language,
                    'status' => $menu->status,
//                    'created_at' => now(),
//                    'updated_at' => now(),
                ];
            }

            $result=Menu::where("language", "$lang")->delete();
            Menu::insert($data);

            return true;

        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function updatings($data, $id)
    {
        try {
            $data["id"] = $id;
            $menu = Menu::find($id);
            $parent = 0;
            if ($menu != null && isset($menu->parent)) {
                $parent = $menu->parent;
            }

            Menu::where("id", $data["id"])->update($data);

            if ($parent != null && $parent > 0)
                $this->checkHasChild($parent);
            if (isset($data["parent"]) && $data["parent"] > 0) {
                $this->checkHasChild($data["parent"]);
            }
            return $data;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function DeleteMenu($id)
    {
        try {
            $menu = Menu::find($id);
            if (Menu::where("id", $id)->delete()) {
                $this->setParent($id, 0);
                $this->checkHasChild($menu->parent);
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
            $menu = Menu::find($id);
            $menu->status = !$menu->status;
            return $menu->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function ordering($parent, $language)
    {
        try {
            $menu = Menu::where("parent", $parent)->where("language", "$language")->max("ordering");
            if ($menu == null || $menu === 0) $menu = 1;
            else $menu += 1;
            return $menu;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function getAll()
    {
        try {
            $menu = Menu::all();
            return $menu;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function getByType($type)
    {
        try {
            $menu = Menu::where("type", "=", "$type")->get();
            return $menu;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function hasChildSet($id, $value)
    {
        try {
            $menu = Menu::where("id", "=", "$id")->update(["has_child" => "$value"]);
            return $menu;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function setParent($id, $value)
    {
        try {
            $menu = Menu::where("parent", "=", "$id")->update(["parent" => "$value"]);
            return $menu;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function checkHasChild($id)
    {
        try {
            $count = Menu::where("parent", $id)->count();
            if ($count > 0) {
                Menu::where("id", "=", "$id")->update(["has_child" => "1"]);
            } else {
                Menu::where("id", "=", "$id")->update(["has_child" => "0"]);
            }
            return $count;
        } catch (QueryException $exp) {
            return $exp;
        }
    }
}

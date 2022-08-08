<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/24/2019
 * Time: 12:25 AM
 */

namespace App\Repositories;


use App\Models\HMAds;
use Illuminate\Database\QueryException;


class HMAdsRepository extends HMAds
{
    public function insert($data)
    {
        try {
            HMAds::insert($data);
            return true;
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function updatings($data)
    {
        try {

            return HMAds::where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function DeleteAll()
    {
        try {
            Category::truncate();
            return true;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

}

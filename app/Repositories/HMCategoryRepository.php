<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/24/2019
 * Time: 12:25 AM
 */

namespace App\Repositories;


use App\Models\HMCategory;
use Illuminate\Database\QueryException;

class HMCategoryRepository extends HMCategory
{

    public function insert($data)
    {
        try {
            HMCategory::insert($data);
            return true;
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function updatings($data)
    {
        try {

            return HMCategory::where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function DeleteAll()
    {
        try {
            HMCategory::truncate();
            return true;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

}

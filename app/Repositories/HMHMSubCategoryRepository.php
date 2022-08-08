<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/24/2019
 * Time: 12:25 AM
 */

namespace App\Repositories;


use App\Models\HMCategory;
use App\Models\HMSubCategory;
use Illuminate\Database\QueryException;

class HMHMSubCategoryRepository extends HMSubCategory
{
    public function insert($data)
    {
        try {
            HMSubCategory::insert($data);
            return true;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function DeleteAll()
    {
        try {
            HMSubCategory::truncate();
            return true;
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function updatings($data)
    {
        try {
            return HMSubCategory::where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }
}

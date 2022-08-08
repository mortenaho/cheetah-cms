<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/24/2019
 * Time: 12:25 AM
 */

namespace App\Repositories;

use App\Models\HMLinks;
use Illuminate\Database\QueryException;

class HMLinksRepository extends HMLinks
{

    public function insert($data)
    {
        try {
            HMLinks::insert($data);
            return true;
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function updatings($data)
    {
        try {

            return HMLinks::where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function DeleteAll()
    {
        try {
            HMLinks::truncate();
            return true;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

}

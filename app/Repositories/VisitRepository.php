<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\Visit;
use Illuminate\Database\QueryException;


class VisitRepository extends Visit
{
    public function insert($data)
    {
        try {
            
            $visit= Visit::create($data);
            return $visit->id;
        } catch (QueryException $exp) {
            dd($exp);
            return $exp;
        }
    }

    public function updatings($data,$id)
    {
        try {
            $data["id"]=$id;
            return Visit::where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function DeleteVisit($id)
    {
        try {
            $data["id"]=$id;
            return Visit::where("id", $id)->delete();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function ChangeStatus($id)
    {
        try {
             $visit=Visit::find($id);
             $visit->status=!$visit->status;
             return  $visit->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

}

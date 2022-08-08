<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\Keyword;
use Illuminate\Database\QueryException;


class KeywordRepository extends Keyword
{
    public function insert($data)
    {
        try {
            $keyword = Keyword::create($data);
            return $keyword->id;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function updatings($data, $id)
    {
        try {
            $data["id"] = $id;
            return Keyword::where("id", $id)->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function DeleteKeyword($id)
    {
        try {
             if(Keyword::where("id", "=", $id)->delete())
             {
                 return 1;
             }
             else
             {
                 return -1;
             }
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function ChangeStatus($id)
    {
        try {
            $keyword = Keyword::find($id);
            $keyword->status = !$keyword->status;
            return $keyword->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function getAll()
    {
        try {
            $keyword = Keyword::all();
            return $keyword;
        } catch (QueryException $exp) {
            return $exp;
        }
    }
}

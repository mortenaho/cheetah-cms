<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\Social;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use ProphecyQueryExceptionQueryException;

class SocialRepository extends Social
{
    public function insert($data)
    {
        try {
            $data["ordering"]=$this->ordering();
            $social= Social::create($data);
            return $social->id;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function updateSocial($data, $id)
    {
        try {
            $data["id"]=$id;
            return Social::where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function DeleteSocial($id)
    {
        try {
            $data["id"]=$id;
            return Social::where("id", $id)->delete();
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function ChangeStatus($id)
    {
        try {
             $social=Social::find($id);
             $social->status=!$social->status;
            return  $social->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function ordering()
    {
        DB::beginTransaction();
        try {
            $post = Social::max("ordering");
            if ($post == null || $post === 0) $post = 1;
            else $post += 1;
            DB::rollBack();
            return $post;
        } catch (QueryException $exp) {
            DB::rollback();
            dd($exp->getMessage());
            return $exp;
        } catch (\Exception $exp) {
            DB::rollback();
            dd($exp->getMessage());
            return $exp;
        }
    }
}

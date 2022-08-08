<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\Attachment;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use ProphecyQueryExceptionQueryException;

class AttachmentRepository extends Attachment
{
    public function insert($data)
    {
        try {
            $data["ordering"]=$this->ordering();
            $attachment= Attachment::create($data);
            return $attachment->id;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function updatings($data,$id)
    {
        try {
            $data["id"]=$id;
            return Attachment::where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function DeleteAttachment($id)
    {
        try {
            $data["id"]=$id;
            return Attachment::where("id", $id)->delete();
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function ChangeStatus($id)
    {
        try {
             $attachment=Attachment::find($id);
             $attachment->status=!$attachment->status;
            return  $attachment->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function ordering()
    {
        DB::beginTransaction();
        try {
            $post = Attachment::max("ordering");
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

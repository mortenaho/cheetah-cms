<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\Slider;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use ProphecyQueryExceptionQueryException;

class SliderRepository extends Slider
{
    public function insert($data)
    {
        try {
            $data["ordering"]=$this->ordering();
            $slider= Slider::create($data);
            return $slider->id;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function updatings($data,$id)
    {
        try {
            $data["id"]=$id;
            $data["ordering"]=$this->ordering();
            return Slider::where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function DeleteSlider($id)
    {
        try {
            return Slider::where("id", $id)->delete();
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function ChangeStatus($id)
    {
        try {
             $slider=Slider::find($id);
             $slider->status=!$slider->status;
            return  $slider->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function ordering()
    {
        DB::beginTransaction();
        try {
            $post = Slider::max("ordering");
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

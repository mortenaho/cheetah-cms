<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\ContactUs;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class ContactUsRepository extends ContactUs
{
    public function insert($data)
    {
        try {
            $data["language"] = app()->getLocale();

            $contactUs = ContactUs::create($data);
            return $contactUs->id;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function updatings($data, $id)
    {
        try {
            $data["id"] = $id;
            $data["language"] = app()->getLocale();
            return ContactUs::where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function DeleteContactUs($id)
    {
        try {
            DB::table("contact_us")->whereIn("id", $id)->delete();
            DB::table("contact_us")->whereIn("parent", $id)->delete();
            return true;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function ChangeStatus($id, $status = null)
    {
        try {
            $contactUs = ContactUs::find($id);
            $contactUs->status = $status != null ? $status : !$contactUs->status;
            return $contactUs->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function isShow($id, $status = null)
    {
        try {
            $contactUs = ContactUs::find($id);
            $contactUs->is_show = $status != null ? $status : !$contactUs->is_show;
            return $contactUs->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function getAll($data)
    {
        try {
            return DB::table("contact_us")
                ->where("full_name", "like", "%{$data}%")
                ->orWhere("email", "like", "%{$data}%")
                ->orWhere("mobile", "like", "%{$data}%")
                ->orWhere("created_at", "like", "%{$data}%")
                ->orderBy("status", "asc")
                ->orderBy("created_at","desc")
                ->paginate(20);
        } catch (QueryException $exp) {
            return $exp;
        }
    }
}

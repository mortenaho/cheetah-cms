<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\Tools;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ToolsRepository extends Tools
{
    public function insert($data)
    {
        try {
            DB::beginTransaction();
            $tools = Tools::create($data);
            DB::commit();
            return $tools->id;
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

    public function updatings($data)
    {

        try {
            DB::beginTransaction();
            DB::commit();
            return Tools::where("id", $data["id"])->update($data);
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

    public function DeleteTools($id)
    {
        try {
            DB::beginTransaction();
            $find = Tools::find($id);
            if ($find->delete()) {
                DB::commit();
                return 1;
            } else {
                DB::rollBack();
                return -1;
            }
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

    public function ChangeStatus($id)
    {
        DB::beginTransaction();
        try {
            $tools = Tools::find($id);
            $tools->status = !$tools->status;
            $tools->save();
            DB::commit();
            return true;
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

    public function isActive($id)
    {
        DB::beginTransaction();
        try {
            $tools = Tools::find($id);
            $tools->is_active = !$tools->is_active;
            $tools->save();
            DB::commit();
            return $tools->is_active;
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


    public function getAll($where, $select = null)
    {
        try {
            if (isset($select))
                $tools = Tools::where($where)->get($select);
            else
                $tools = Tools::where($where)->get();
            return $tools;
        } catch (QueryException $exp) {
            dd($exp->getMessage());
            return $exp;
        } catch (\Exception $exp) {
            dd($exp->getMessage());
            return $exp;
        }
    }


}

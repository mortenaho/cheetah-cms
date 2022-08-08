<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\OrderDetailsModel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderDetailsRepository extends OrderDetailsModel
{
    public function insert($data)
    {
        try {
            $orderDetails = OrderDetailsModel::query()->insertGetId($data);
            return $orderDetails;
        } catch (QueryException $exp) {

            Log::error($exp->getMessage(), [$exp]);
            return $exp;
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), [$exp]);
            return $exp;
        }

    }

    public function updatings($data, $id)
    {
        try {
            return OrderDetailsModel::where("id", $id)->update($data);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), [$exp]);
            return -1;
        }
    }

    public function DeletePost($id)
    {
        try {
            DB::beginTransaction();
            $find = OrderDetailsModel::find($id);
            if ($find->order_meta()->count() > 0) {
                $find->order_meta()->delete();
            }
            if ($find->delete()) {
                DB::commit();
                return 1;
            } else {
                DB::rollBack();
                return -1;
            }
        } catch (QueryException $exp) {
            DB::rollback();
            Log::error($exp->getMessage(), [$exp]);
            return -1;
        } catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage(), [$exp]);
            return -1;
        }
    }

    public function ChangeStatus($id)
    {
        DB::beginTransaction();
        try {
            $orderDetails = OrderDetailsModel::find($id);
            $orderDetails->status = !$orderDetails->status;
            $orderDetails->save();
            DB::commit();
            return true;
        } catch (QueryException $exp) {
            DB::rollback();
            return $exp;
        } catch (\Exception $exp) {
            DB::rollback();
            return $exp;
        }
    }

    public function getAll()
    {
        try {
            $orderDetails = OrderDetailsModel::all();
            return $orderDetails;
        } catch (QueryException $exp) {
            return $exp;
        } catch (\Exception $exp) {

            return $exp;
        }
    }

}

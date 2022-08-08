<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\OrdersModel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class OrdersRepository extends OrdersModel
{
    public function insert($data)
    {
        try {

            $post = OrdersModel::query()->insertGetId($data);
            return $post;
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
            return OrdersModel::where("id", $id)->update($data);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), [$exp]);
            return -1;
        }
    }

    public function DeleteOrder($id)
    {
        try {
            DB::beginTransaction();
            $find = OrdersModel::find($id);
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
        try {
            $order = OrdersModel::find($id);
            $order->status =  !$order->status;
            return $order->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function ChangePaymentStatus($id)
    {
        try {
            $order = OrdersModel::find($id);
            $order->payment_status = !$order->payment_status;
            return $order->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function getAll()
    {
        try {
            $order = OrdersModel::all();
            return $order;
        } catch (QueryException $exp) {
            return $exp;
        } catch (\Exception $exp) {

            return $exp;
        }
    }

}

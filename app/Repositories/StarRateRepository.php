<?php
namespace App\Repository;

use App\Model\StarRateModel;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StarRateRepository extends StarRateModel
{
    public function insert($param)
    {

        try {
            if ($this->UserHasRate($param["table_name"], $param["table_id"], $param["user_id"]) == false) {
                return DB::table($this->table)->insertGetId($param);
            }
            return 0;
        } catch (Exception $ex) {
            Log::error($ex->getMessage(), [$ex]);
            return -1;
        }
    }
    public function UserHasRate($table_name, $table_id, $user_id)
    {
        try {
            return $this::query()->where(["table_name" => $table_name, "table_id" => $table_id, "user_id" => $user_id])->exists();
        } catch (Exception $ex) {
            Log::error($ex->getMessage(), [$ex]);
            return null;
        }
    }

    public function GetRateForTable($table_name, $table_id)
    {
        try {
            return $this::query()->where(["table_name" => $table_name, "table_id" => $table_id])->get();
        } catch (Exception $ex) {
            Log::error($ex->getMessage(), [$ex]);
            return null;
        }
    }
}

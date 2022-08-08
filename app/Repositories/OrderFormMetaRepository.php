<?php
/**
 * Created by PhpStorm.
 * User: Mortenaho
 * Date: 3/18/2021
 * Time: 4:53 PM
 */

namespace App\Repositories;


use App\Models\OrderFormMetaModel;
use Illuminate\Support\Facades\Log;

class OrderFormMetaRepository extends OrderFormMetaModel
{
    public function insert($param)
    {
        try {
            return OrderFormMetaModel::query()->insert($param);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage(), [$ex]);
            return false;
        }
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\Customer;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use ProphecyQueryExceptionQueryException;

class CustomerRepository extends Customer
{
    public function insert($data)
    {
        try {
            $customer= Customer::create($data);
            return $customer->id;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function updatings($data,$id)
    {
        try {
            $data["id"]=$id;
            return Customer::where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function deleteCustomer($id)
    {
        try {
            return Customer::where("id", $id)->delete();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/20/2019
 * Time: 1:43 AM
 */

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\QueryException;

class UserRepository extends User
{
    public function getUser($id)
    {
        try {
            return User::find($id);
        } catch (QueryException $exp) {
            return $exp;
        }
    }


    public function updateUser($data, $id)
    {
        try {
            $data["id"] = $id;
            return User::where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function changePassword($password, $id)
    {
        try {
            $user = User::find($id);
            $user->password = $password;
            return $user->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function DeleteUser($id)
    {
        try {
            $data["id"]=$id;
            return User::where("id", $id)->delete();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function ChangeStatus($id)
    {
        try {
            $user=User::find($id);
            $user->status=!$user->status;
            return  $user->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function Activate($id)
    {
        try {
            $user=User::find($id);
            $user->is_active=!$user->is_active;
            return  $user->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

}

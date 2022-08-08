<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/20/2019
 * Time: 1:43 AM
 */

namespace App\Repositories;


use App\Models\Setting;
use Illuminate\Database\QueryException;

class SettingRepository extends Setting
{
  public function getSetting()
  {
      try{
          return Setting::first();
      }
      catch (QueryException $exp)
      {
          return $exp;
      }
  }


  public function updateSetting($data,$id)
  {
      try {
          $data["id"]=$id;
          return Setting::where("id", $data["id"])->update($data);
      } catch (QueryException $exp) {
          return $exp;
      }
  }
}

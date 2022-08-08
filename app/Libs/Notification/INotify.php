<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 7/26/2019
 * Time: 1:32 PM
 */

namespace App\Libs\Notification;


interface INotify
{
   public function Add(Notification $notification);
   public function Show();
}

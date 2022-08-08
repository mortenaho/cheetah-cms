<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 7/26/2019
 * Time: 1:36 PM
 */

namespace App\Libs\Notification;


use App\Events\NotificationEvent;

class CommentINotify implements INotify
{

    public function Add(Notification $notification)
    {
        event(new NotificationEvent($notification));
    }

    public function Show()
    {
        // TODO: Implement Show() method.
    }
}

<?php

namespace Modules\Client\Page\Notification\Controllers;

use App\Http\Controllers\Controller;
use Modules\Client\Page\Notification\Models\NotificationModel;
use Modules\Client\Page\Notification\Models\ReadNotificationModel;

class ReadNotificationController extends Controller
{
    public function readNotification()
    {
        $idRead = ReadNotificationModel::select('notification_id')->where('user_id', $_SESSION['id'])->get()->toArray();
        $notification = NotificationModel::select('*')->whereNotIn('id', $idRead)->get();
        foreach($notification as $key => $value){
            $params = [
                'id' => (string)\Str::uuid(),
                'notification_id' => $value->id,
                'user_id' => $_SESSION['id'],
                'created_at' => date('Y-m-d H:i:s')
            ];
            ReadNotificationModel::insert($params);
        }
    }
}
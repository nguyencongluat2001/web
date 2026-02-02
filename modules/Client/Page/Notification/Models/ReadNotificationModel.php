<?php

namespace Modules\Client\Page\Notification\Models;

use Illuminate\Database\Eloquent\Model;

class ReadNotificationModel extends Model
{
    protected $table = 'read_notifications';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'notification_id',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
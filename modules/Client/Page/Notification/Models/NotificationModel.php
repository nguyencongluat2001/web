<?php

namespace Modules\Client\Page\Notification\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationModel extends Model
{
    protected $table = 'notifications';
    public $incrementing = false;
    public $timestamps = false;
}
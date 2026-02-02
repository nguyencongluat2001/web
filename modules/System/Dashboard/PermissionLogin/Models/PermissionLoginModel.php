<?php

namespace Modules\System\Dashboard\PermissionLogin\Models;

use Illuminate\Database\Eloquent\Model;


class PermissionLoginModel extends Model
{
    protected $table = 'permission_check_login';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'email',
        'user_id',
        'token',
        'ip',
        'created_at',
        'updated_at'
    ];
}

<?php

namespace Modules\System\Dashboard\PermissionLogin\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\PermissionLogin\Repositories\PermissionLoginRepository;

class PermissionLoginService extends Service
{
    public function __construct(){}
    public function repository()
    {
        return PermissionLoginRepository::class;
    }

}

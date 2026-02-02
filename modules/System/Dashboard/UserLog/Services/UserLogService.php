<?php

namespace Modules\System\Dashboard\UserLog\Services;

use Modules\Base\Service;
use Modules\System\Dashboard\UserLog\Repositories\UserLogRepository;

class UserLogService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }
    public function repository()
    {
        return UserLogRepository::class;
    }
}
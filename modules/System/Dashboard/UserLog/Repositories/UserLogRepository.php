<?php

namespace Modules\System\Dashboard\UserLog\Repositories;

use Modules\Base\Repository;
use Modules\System\Dashboard\UserLog\Models\UserLogModel;

class UserLogRepository extends Repository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return UserLogModel::class;
    }
}
<?php

namespace Modules\System\Dashboard\PermissionLogin\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Dashboard\PermissionLogin\Models\PermissionLoginModel;

class PermissionLoginRepository extends Repository
{
    public function model(){
        return PermissionLoginModel::class;
    }
}

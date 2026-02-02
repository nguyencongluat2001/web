<?php

namespace Modules\System\Dashboard\Users\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Dashboard\Users\Models\UserInfoModel;

class UserInfoRepository extends Repository
{

    public function model(){
        return UserInfoModel::class;
    }
}

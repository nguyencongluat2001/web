<?php

namespace Modules\System\Dashboard\Users\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Dashboard\Users\Models\UserModel;

class UserRepository extends Repository
{
    public function model(){
        return UserModel::class;
    }
}

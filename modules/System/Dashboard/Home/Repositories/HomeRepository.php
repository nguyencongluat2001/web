<?php

namespace Modules\System\Dashboard\Home\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Position\Models\PositionModel;
use Modules\System\Dashboard\Home\Models\HomeModel;

class HomeRepository extends Repository
{

    public function model(){
        return HomeModel::class;
    }
}

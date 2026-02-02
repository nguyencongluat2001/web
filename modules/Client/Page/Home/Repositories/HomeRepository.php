<?php

namespace Modules\Client\Page\Home\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\Client\Page\Home\Models\HomeModel;

class HomeRepository extends Repository
{

    public function model(){
        return HomeModel::class;
    }
}

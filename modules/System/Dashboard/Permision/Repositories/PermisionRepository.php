<?php

namespace Modules\System\Dashboard\Permision\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Position\Models\PositionModel;
use Modules\System\Dashboard\Permision\Models\PermisionModel;

class PermisionRepository extends Repository
{
    public function model(){
        return PermisionModel::class;
    }
}

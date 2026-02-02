<?php

namespace Modules\System\Dashboard\Hospital\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Position\Models\PositionModel;
use Modules\System\Dashboard\Hospital\Models\SystemClinicsModel;

class SystemClinicsRepository extends Repository
{
    public function model(){
        return SystemClinicsModel::class;
    }
}

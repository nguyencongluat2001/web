<?php

namespace Modules\System\Dashboard\Specialty\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Position\Models\PositionModel;
use Modules\System\Dashboard\Specialty\Models\SpecialtyModel;

class SpecialtyRepository extends Repository
{
    public function model(){
        return SpecialtyModel::class;
    }
}

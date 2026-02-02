<?php

namespace Modules\System\Dashboard\BloodTest\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Position\Models\PositionModel;
use Modules\System\Dashboard\BloodTest\Models\BloodTestModel;

class BloodTestRepository extends Repository
{
    public function model(){
        return BloodTestModel::class;
    }
}

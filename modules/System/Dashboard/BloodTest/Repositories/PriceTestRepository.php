<?php

namespace Modules\System\Dashboard\BloodTest\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Dashboard\BloodTest\Models\PriceTestModel;

class PriceTestRepository extends Repository
{
    public function model(){
        return PriceTestModel::class;
    }
}

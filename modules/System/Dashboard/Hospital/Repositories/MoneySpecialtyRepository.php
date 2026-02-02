<?php

namespace Modules\System\Dashboard\Hospital\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Position\Models\PositionModel;
use Modules\System\Dashboard\Hospital\Models\MoneySpecialtyModel;

class MoneySpecialtyRepository extends Repository
{
    public function model(){
        return MoneySpecialtyModel::class;
    }
}

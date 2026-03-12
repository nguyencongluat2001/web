<?php

namespace Modules\System\Dashboard\Abount\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Dashboard\Abount\Models\AbountModel;

class AbountRepository extends Repository
{

    public function model(){
        return AbountModel::class;
    }
}

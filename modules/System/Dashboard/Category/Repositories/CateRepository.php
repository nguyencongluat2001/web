<?php

namespace Modules\System\Dashboard\Category\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Dashboard\Category\Models\CateModel;

class CateRepository extends Repository
{
    public function model(){
        return CateModel::class;
    }
}

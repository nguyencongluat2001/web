<?php

namespace Modules\System\Dashboard\Sql\Repositories;

use Modules\Base\Repository;
use Modules\System\Dashboard\Sql\Models\SqlModel;

class SqlRepository extends Repository
{
    public function model(){
        return SqlModel::class;
    }
}

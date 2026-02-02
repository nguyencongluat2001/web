<?php

namespace Modules\System\Dashboard\CustomerCare\Repositories;

use Modules\Base\Repository;
use Modules\System\Dashboard\CustomerCare\Models\CustomerCareModel;

class CustomerCareRepository extends Repository
{
    public function model(){
        return CustomerCareModel::class;
    }
}

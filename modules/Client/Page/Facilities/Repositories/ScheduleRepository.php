<?php

namespace Modules\Client\Page\Facilities\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\Client\Page\Facilities\Models\ScheduleModel;

class ScheduleRepository extends Repository
{

    public function model(){
        return ScheduleModel::class;
    }
}

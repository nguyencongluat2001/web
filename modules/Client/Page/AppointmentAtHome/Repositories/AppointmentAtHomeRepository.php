<?php

namespace Modules\Client\Page\AppointmentAtHome\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\Client\Page\AppointmentAtHome\Models\AppointmentAtHomeModel;

class AppointmentAtHomeRepository extends Repository
{

    public function model(){
        return AppointmentAtHomeModel::class;
    }
}

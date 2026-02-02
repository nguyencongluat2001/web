<?php

namespace Modules\System\Dashboard\AppointmentAtHome\Repositories;

use Modules\Base\Repository;
use Modules\System\Dashboard\AppointmentAtHome\Models\AppointmentAtHomeModel;

class AppointmentAtHomeRepository extends Repository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return AppointmentAtHomeModel::class;
    }
}
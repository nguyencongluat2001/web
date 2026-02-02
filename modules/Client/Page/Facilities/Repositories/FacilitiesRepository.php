<?php

namespace Modules\Client\Page\Facilities\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\Client\Page\Facilities\Models\FacilitiesModel;

class FacilitiesRepository extends Repository
{

    public function model(){
        return FacilitiesModel::class;
    }
}

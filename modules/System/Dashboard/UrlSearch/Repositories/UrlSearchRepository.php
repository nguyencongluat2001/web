<?php

namespace Modules\System\Dashboard\UrlSearch\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Dashboard\UrlSearch\Models\UrlSearchModel;

class UrlSearchRepository extends Repository
{
    public function model(){
        return UrlSearchModel::class;
    }
}

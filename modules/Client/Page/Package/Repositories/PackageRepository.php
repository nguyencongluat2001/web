<?php

namespace Modules\Client\Page\Package\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\Client\Page\Package\Models\PackageModel;

class PackageRepository extends Repository
{

    public function model(){
        return PackageModel::class;
    }
}

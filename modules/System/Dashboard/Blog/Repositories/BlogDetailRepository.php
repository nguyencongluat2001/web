<?php

namespace Modules\System\Dashboard\Blog\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Dashboard\Blog\Models\BlogDetailModel;

class BlogDetailRepository extends Repository
{

    public function model(){
        return BlogDetailModel::class;
    }
}

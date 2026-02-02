<?php

namespace Modules\System\Dashboard\Blog\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Dashboard\Blog\Models\BlogModel;

class BlogRepository extends Repository
{

    public function model(){
        return BlogModel::class;
    }
}

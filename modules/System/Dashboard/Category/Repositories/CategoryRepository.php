<?php

namespace Modules\System\Dashboard\Category\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Dashboard\Category\Models\CategoryModel;

class CategoryRepository extends Repository
{
    public function model(){
        return CategoryModel::class;
    }
}

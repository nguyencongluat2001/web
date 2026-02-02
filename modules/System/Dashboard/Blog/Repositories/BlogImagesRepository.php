<?php

namespace Modules\System\Dashboard\Blog\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Dashboard\Blog\Models\BlogImagesModel;

class BlogImagesRepository extends Repository
{

    public function model(){
        return BlogImagesModel::class;
    }
}

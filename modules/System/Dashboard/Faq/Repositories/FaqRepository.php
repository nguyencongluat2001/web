<?php

namespace Modules\System\Dashboard\Faq\Repositories;

use Modules\Base\Repository;
use Modules\System\Dashboard\Faq\Models\FaqModel;

class FaqRepository extends Repository
{
    public function model(){
        return FaqModel::class;
    }
}

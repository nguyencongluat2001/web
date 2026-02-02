<?php

namespace Modules\Client\Page\Contact\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\Client\Page\Contact\Models\ContactModel;

class ContactRepository extends Repository
{

    public function model(){
        return ContactModel::class;
    }
}

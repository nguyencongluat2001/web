<?php

namespace Modules\Client\Page\Contact\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\Client\Page\Contact\Repositories\ContactRepository;
use Illuminate\Support\Facades\Http;
use Str;

class ContactService extends Service
{

    public function __construct(

    ){

    }
    public function repository()
    {
        return ContactRepository::class;
    }
}

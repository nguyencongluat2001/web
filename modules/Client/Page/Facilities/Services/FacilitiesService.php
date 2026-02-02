<?php

namespace Modules\Client\Page\Facilities\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\Client\Page\Facilities\Repositories\FacilitiesRepository;
use Illuminate\Support\Facades\Http;
use Str;

class FacilitiesService extends Service
{

    public function __construct(

    ){

    }
    public function repository()
    {
        return FacilitiesRepository::class;
    }
}

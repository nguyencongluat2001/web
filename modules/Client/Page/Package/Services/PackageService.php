<?php

namespace Modules\Client\Page\Package\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\Client\Page\Package\Repositories\PackageRepository;
use Illuminate\Support\Facades\Http;
use Str;

class PackageService extends Service
{

    public function __construct(

    ){

    }
    public function repository()
    {
        return PackageRepository::class;
    }
}

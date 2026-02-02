<?php

namespace Modules\System\Dashboard\Blog\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\Blog\Repositories\BlogImagesRepository;
use Str;

class BlogImagesService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function repository()
    {
        return BlogImagesRepository::class;
    }

}

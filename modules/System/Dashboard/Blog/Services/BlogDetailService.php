<?php

namespace Modules\System\Dashboard\Blog\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\Blog\Repositories\BlogDetailRepository;
use Str;

class BlogDetailService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function repository()
    {
        return BlogDetailRepository::class;
    }

}

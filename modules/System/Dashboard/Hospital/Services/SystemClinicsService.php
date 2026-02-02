<?php

namespace Modules\System\Dashboard\Hospital\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\Hospital\Repositories\SystemClinicsRepository;
use Str;
use Modules\Base\Library;


class SystemClinicsService extends Service
{

    public function __construct(
        SystemClinicsRepository $SystemClinicsRepository
        )
    {
        $this->SystemClinicsRepository = $SystemClinicsRepository;
        parent::__construct();
    }

    public function repository()
    {
        return SystemClinicsRepository::class;
    }
}

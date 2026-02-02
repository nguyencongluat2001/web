<?php

namespace Modules\System\Dashboard\Hospital\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\Hospital\Repositories\MoneySpecialtyRepository;
use Str;
use Modules\Base\Library;


class MoneySpecialtyService extends Service
{

    public function __construct(
        MoneySpecialtyRepository $moneySpecialtyRepository
        )
    {
        $this->moneySpecialtyRepository = $moneySpecialtyRepository;
        parent::__construct();
    }

    public function repository()
    {
        return MoneySpecialtyRepository::class;
    }
}

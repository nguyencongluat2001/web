<?php

namespace Modules\System\Dashboard\ApprovePayment\Repositories;

use Modules\Base\Repository;
use Modules\System\Dashboard\ApprovePayment\Models\ApprovePaymentModel;

class ApprovePaymentRepository extends Repository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return ApprovePaymentModel::class;
    }
}
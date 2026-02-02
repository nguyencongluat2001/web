<?php

namespace Modules\System\Dashboard\CustomerCare\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerCareModel extends Model
{
    protected $table = 'customers_care';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'phone',
        'question',
        'reply',
        'created_at',
        'updated_at'
    ];
}

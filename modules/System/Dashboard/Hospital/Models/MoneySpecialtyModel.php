<?php

namespace Modules\System\Dashboard\Hospital\Models;

use Illuminate\Database\Eloquent\Model;

class MoneySpecialtyModel extends Model
{
    protected $table = 'money_specialty';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'code_hospital',
        'code_specialty',
        'money',
        'created_at',
        'updated_at'
    ];
}

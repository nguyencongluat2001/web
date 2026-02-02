<?php

namespace Modules\System\Dashboard\BloodTest\Models;

use Illuminate\Database\Eloquent\Model;

class PriceTestModel extends Model
{
    protected $table = 'price_test';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'code_blood',
        'code',
        'name',
        'price',
        'created_at',
        'updated_at',
    ];

    public function filter($query, $param, $value)
    {
        switch ($param) {
            case 'search':
                $this->value = $value;
                return $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->value . '%');
                });
                return $query;
            case 'cate':
                $query->where('code_blood', $value);
                return $query;
            default:
                return $query;
        }
    }
}

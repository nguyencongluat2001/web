<?php

namespace Modules\System\Dashboard\BloodTest\Models;

use Illuminate\Database\Eloquent\Model;

class BloodTestModel extends Model
{
    protected $table = 'blood_test';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'code',
        'name',
        'form',
        'sex',
        'age',
        'date_created',
        'date_end', 
        'address',
        'promotion', 
        'decision',
        'created_at',
        'updated_at',
    ];

    public function filter($query, $param, $value)
    {
        switch ($param) {
            case 'search':
                $this->value = $value;
                // dd($this->value);
                return $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->value . '%');
                });
                return $query;
            // case 'cate':
            //     $query->where('category_BloodTest', $value);
            //     return $query;
            default:
                return $query;
        }
    }
}

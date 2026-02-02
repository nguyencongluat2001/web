<?php

namespace Modules\Client\Page\Facilities\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleModel extends Model
{
    protected $table = 'schedule';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
           'id',
           'code_schedule',
           'code_hospital',
           'code_physician',
           'code_specialty',
           'type_payment',
           'money',
           'name',
           'phone',
           'code_insurance',
           'sex',
           'email',
           'date_of_brith',
           'code_tinh',
           'code_huyen',
           'code_xa',
           'address',
           'date_sampling',
           'hour_sampling',
           'code_introduce',
           'reason',
           'name_image',
           'created_at',
           'updates_at'
    ];

    public function filter($query, $param, $value)
    {
        switch ($param) {
            case 'search':
                $this->value = $value;
                // dd($this->value);
                return $query->where(function ($query) {
                    $query->where('name_hospital', 'like', '%' . $this->value . '%');
                });
                return $query;
            // case 'cate':
            //     $query->where('category_Hospital', $value);
            //     return $query;
            default:
                return $query;
        }
    }
}

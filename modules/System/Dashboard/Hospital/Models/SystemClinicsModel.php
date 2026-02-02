<?php

namespace Modules\System\Dashboard\Hospital\Models;

use Illuminate\Database\Eloquent\Model;

class SystemClinicsModel extends Model
{
    protected $table = 'system_clinics';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
       'id',
       'code_hospital', // mã bệnh viện phòng khám
       'code',
       'name',
       'time',//thời gian khám
       'specialtys', //chuyên khoa
       'money', //phí khám
       'profile', //tiểu sử
       'order',
       'image',
       'created_at',
       'updated_at'
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
            case 'code_hospital':
                $query->where('code_hospital', $value);
                return $query;
            default:
                return $query;
        }
    }
}

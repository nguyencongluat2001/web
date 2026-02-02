<?php

namespace Modules\Client\Page\AppointmentAtHome\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentAtHomeModel extends Model
{
    protected $table = 'service_at_home';
    public $incrementing = false;
    public $timestamps = false;
    public $sortable = ['created_at'];
    protected $fillable = [
            'id',
            'code',
            'code_patient',
            'code_indications',
            'code_doctor',
            'money',
            'name',
            'phone',
            'money',
            'type',
            'type_at_home',
            'sex',
            'date_sampling',
            'hour_sampling',
            'appointment', //ngày hẹn xn lại
            'address',
            'reason',
            'type_payment',
            'code_ctv',
            'status',
            'date_birthday',
            'link_excel',
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
                    $query->where('name', 'like', '%' . $this->value . '%')
                    ->orWhere('code', 'like', '%' . $this->value . '%')
                    ->orWhere('phone', 'like', '%' . $this->value . '%')
                    ->orWhere('code_patient', 'like', '%' . $this->value . '%');
                });
                return $query;
            case 'code':
                $query->where('code_ctv', $value);
                return $query;
            case 'status':
                $query->where('status', $value);
                return $query;
            case 'code_doctor':
                $query->whereNotNull('code_doctor');
                return $query;
            case 'fromDate':
                if(!empty($value)){
                    $query->whereDate('created_at', '>=', $value);
                    return $query;
                }
            case 'toDate':
                if(!empty($value)){
                    $query->whereDate('created_at', '<=', $value);
                    return $query;
                }
            default:
                return $query;
        }
    }
}

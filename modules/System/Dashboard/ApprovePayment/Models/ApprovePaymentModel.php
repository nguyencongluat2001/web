<?php

namespace Modules\System\Dashboard\ApprovePayment\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\System\Dashboard\Category\Models\CategoryModel;
use Modules\System\Dashboard\Users\Models\UserModel;
use Modules\System\Helpers\NclLibraryHelper;

class ApprovePaymentModel extends Model
{
    protected $table = 'schedule';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'code_schedule',
        'code_hospital',
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
        'code_introduce',
        'reason',
        'name_image',
        'status',
        'created_at',
        'updates_at'
    ];

    public function filter($query, $param, $value)
    {
        switch ($param) {
            case 'id':
                $query->where('id', $value);
                return $query;
            case 'search':
                if(!empty($value)){
                    $query->where(function($sql) use($value){
                        $sql->where('code_schedule', 'like', "$value")
                        ->orWhere('phone', 'like', "$value")
                        ->orWhere('email', 'like', "$value")
                        ->orWhere('address', 'like', "$value");
                    });
                }
                return $query;
            case 'type_payment':
                if(!empty($value)){
                    $query->where('type_payment', $value);
                }
                return $query;
            case 'fromdate':
                if(!empty($value)){
                    $query->where('created_at', '>=', date('Y-m-d H:i:s', strtotime(NclLibraryHelper::_ddmmyyyyToyyyymmdd($value, 3))));
                    return $query;
                }
            case 'todate':
                if(!empty($value)){
                    $query->where('created_at', '<=', date('Y-m-d H:i:s', strtotime(NclLibraryHelper::_ddmmyyyyToyyyymmdd($value, 2))));
                    return $query;
                }
            default: 
                return $query;
        }
    }
    
}
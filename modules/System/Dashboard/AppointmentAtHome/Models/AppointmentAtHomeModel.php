<?php

namespace Modules\System\Dashboard\AppointmentAtHome\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\System\Dashboard\Category\Models\CategoryModel;
use Modules\System\Dashboard\Users\Models\UserModel;
use Modules\System\Helpers\NclLibraryHelper;

class AppointmentAtHomeModel extends Model
{
    protected $table = 'service_at_home';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'code',
        'name',
        'phone',
        'type',
        'sex',
        'date_sampling',
        'hour_sampling',
        'address',
        'reason',
        'money',
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
                        $sql->where('code', 'like', "$value")
                        ->orWhere('phone', 'like', "$value")
                        ->orWhere('address', 'like', "$value")
                        ->orWhere('code_ctv', 'like', "$value");
                    });
                }
                return $query;
            case 'type_at_home':
                 $query->where('type_at_home', $value);
                return $query;
            case 'status':
                $query->where('status', $value);
                return $query;
            case 'fromdate':
                if(!empty($value)){
                    $query->whereDate('created_at', '>=',$value);
                    return $query;
                }
            case 'todate':
                if(!empty($value)){
                    $query->whereDate('created_at', '<=',$value);
                    return $query;
                }
            default: 
                return $query;
        }
    }
    
}
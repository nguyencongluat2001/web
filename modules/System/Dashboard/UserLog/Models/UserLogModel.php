<?php

namespace Modules\System\Dashboard\UserLog\Models;

use Illuminate\Database\Eloquent\Model;

class UserLogModel extends Model
{
    protected $table = 'user_log'; // Kiểm soát đăng nhập
    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'email',
        'name',
        'ip',
        'created_at',
        'updated_at',
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
                        $sql->where('name', 'like', "%$value%")
                        ->orWhere('email', 'like', "%$value%")
                        ->orWhere('ip', "$value");
                    });
                }
                return $query;
            default: 
                return $query;
        }
    }
}
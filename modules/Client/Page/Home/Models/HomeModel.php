<?php

namespace Modules\System\Dashboard\Home\Models;

use Illuminate\Database\Eloquent\Model;
// use Modules\Core\Ncl\Http\BaseModel;

class HomeModel extends Model
{
    protected $table = 'users';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        // 'id',
        'name',
        'address',
        'phone',
        'email',
        'password',
        'dateBirth',
        'role'
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
            case 'role':
                $query->where('role', $value);
                return $query;
            default:
                return $query;
        }
    }
}

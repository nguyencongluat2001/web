<?php

namespace Modules\System\Dashboard\Permision\Models;

use Illuminate\Database\Eloquent\Model;

class PermisionModel extends Model
{
    protected $table = 'permision';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name_handbook',
        'category_handbook',
        'type_handbook',
        'url_link',
        'decision',
        'current_status'
    ];

    public function filter($query, $param, $value)
    {
        switch ($param) {
            case 'cate':
                $query->where('category_handbook', $value);
                return $query;
            default:
                return $query;
        }
    }
}

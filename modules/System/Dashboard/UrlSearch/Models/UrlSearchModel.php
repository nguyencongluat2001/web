<?php

namespace Modules\System\Dashboard\UrlSearch\Models;

use Illuminate\Database\Eloquent\Model;

class UrlSearchModel extends Model
{
    protected $table = 'url_search';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'url',
        'decision',
        'current_status',
        'order',
        'current_status'
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
            //     $query->where('category', $value);
            //     return $query;
            default:
                return $query;
        }
    }
}

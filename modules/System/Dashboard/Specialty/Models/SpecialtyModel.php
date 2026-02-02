<?php

namespace Modules\System\Dashboard\Specialty\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialtyModel extends Model
{
    protected $table = 'specialtys';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name_specialty',
        'code',
        'decision',
        'avatar',
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
                    $query->where('name_specialty', 'like', '%' . $this->value . '%');
                });
                return $query;
            // case 'cate':
            //     $query->where('category_Specialty', $value);
            //     return $query;
            default:
                return $query;
        }
    }
}

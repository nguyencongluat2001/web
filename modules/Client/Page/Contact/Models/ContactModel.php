<?php

namespace Modules\System\Dashboard\Contact\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = 'hospitals';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name_hospital',
        'code',
        'decision',
        'avatar',
        'address',
        'current_status'
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

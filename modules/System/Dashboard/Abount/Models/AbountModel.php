<?php

namespace Modules\System\Dashboard\Abount\Models;

use Illuminate\Database\Eloquent\Model;

class AbountModel extends Model
{
    protected $table = 'abount';
    public $incrementing = false;
    public $timestamps = false;
    public $sortable = ['created_at'];

    protected $fillable = [
        'id',
        'code',
        'decision',
        'decision_en',
        'avatar',
        'status',
        'created_at',
        'updated_at'
    ];

    public function filter($query, $param, $value)
    {
        switch ($param) {
            case 'search':
                $this->value = $value;
                // dd($this->value);
                // return $query->where(function ($query) {
                //     $query->whereRelation('detailAbount', 'title', $this->value)
                //         ->orWhere('code_Abount', 'like', '%' . $this->value . '%');
                // });
            // case 'category':
            //     $query->where('code_category', $value);
            //     return $query;
            default:
                return $query->where('status', 1);
        }
    }
}

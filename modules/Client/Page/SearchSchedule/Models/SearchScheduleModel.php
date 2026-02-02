<?php

namespace Modules\Client\Page\SearchSchedule\Models;

use Illuminate\Database\Eloquent\Model;

class SearchScheduleModel extends Model
{
    protected $table = 'schedule';
    public $incrementing = false;
    public $timestamps = false;

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

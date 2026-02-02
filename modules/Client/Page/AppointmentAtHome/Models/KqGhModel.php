<?php

namespace Modules\Client\Page\AppointmentAtHome\Models;

use Illuminate\Database\Eloquent\Model;

class KqGhModel extends Model
{
    protected $table = 'kq_gh';
    public $incrementing = false;
    public $timestamps = false;
    public $sortable = ['created_at'];
    protected $fillable = [
            'id',
            'code',
            'namefile',
            'url',
            'status',
            'created_at',
            'updates_at'
    ];
}

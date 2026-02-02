<?php

namespace Modules\Client\Page\AppointmentAtHome\Models;

use Illuminate\Database\Eloquent\Model;

class PatientModel extends Model
{
    protected $table = 'patient';
    public $incrementing = false;
    public $timestamps = false;
    public $sortable = ['created_at'];
    protected $fillable = [
            'id',
            'code',
            'name',
            'phone',
            'date_of_birth',
            'sex',
            'address',
            'created_at',
            'updates_at'
    ];
}

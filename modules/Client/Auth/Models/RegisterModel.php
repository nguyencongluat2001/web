<?php

namespace Modules\Client\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    protected $table = 'register';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'address',
        'phone',
        'dateBirth',
        'company',
        'position',
        'date_join',
        'email',
        'password',
        'user_introduce',
        'id_personnel',
        'created_at',
        'updated_at',
    ];
}

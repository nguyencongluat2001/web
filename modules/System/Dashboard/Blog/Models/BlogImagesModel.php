<?php

namespace Modules\System\Dashboard\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class BlogImagesModel extends Model
{
    protected $table = 'blogs_image';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'code_blog',
        'name',
        'name_image', 
        'order_image',
        'created_at',
        'updated_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/** @mixin \Eloquent */

class BlogCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'parent_id',
        'slug',
        'title',
        'description',
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'imageable_type',
        'imageable_id',
        'path',
        'caption',
    ];
}

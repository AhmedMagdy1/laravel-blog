<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title'];

    function scopeTagIds($query)
    {
        return $this->id;
    }
}

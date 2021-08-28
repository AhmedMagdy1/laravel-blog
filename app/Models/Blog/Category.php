<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'parent_id'];

    public function parentCategory()
    {
        return $this->hasMany('\App\Models\Blog\Category', 'id', 'parent_id');
    }
}

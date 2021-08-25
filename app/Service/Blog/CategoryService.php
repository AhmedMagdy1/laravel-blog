<?php

namespace App\Service\Blog;

use App\Models\Blog\Category;

class CategoryService
{
    function getPaginated()
    {
        return Category::paginate(10);
    }
    function get($id)
    {
        return Category::find($id);
    }
}

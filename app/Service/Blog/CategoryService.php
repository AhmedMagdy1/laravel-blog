<?php

namespace App\Service\Blog;

use App\Http\Helpers\Lookups;
use App\Models\Blog\Category;

use App\Entity\Blog\Category as CategoryEntity;

class CategoryService
{
    function getPaginated()
    {
        return Category::paginate(10);
    }
    function getLookups()
    {
        $categories = Category::all();
        return Lookups::format($categories);
    }
    function get($id)
    {
        return Category::find($id);
    }
    function store(CategoryEntity $category)
    {
        return Category::insert($category->toArray(['id']));

    }
    function update(CategoryEntity $category, $id)
    {
        return Category::find($id)->update($category->toArray(['id']));
    }

}

<?php

namespace App\Service\Blog;

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
        return $this->formatCategories($categories);
    }
    private function formatCategories($categories)
    {
        $result = [null => 'Please Select Category'];
        foreach ($categories as $category) {
            $result[$category->id] = $category->name;
        }
        return $result;
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

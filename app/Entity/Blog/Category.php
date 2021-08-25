<?php

namespace App\Entity\Blog;

class Category
{
    private $id, $name, $slug, $parent_id;

    public function __construct($category = '')
    {
        $this->id = isset($category->id) ? $category->id : '';
        $this->name = isset($category->name) ? $category->name : '';
        $this->slug = isset($category->slug) ? $category->slug : '';
        $this->parent_id = isset($category->parent_id) ? $category->parent_id : null;
    }
    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return null
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return null
     */
    public function getParentId()
    {
        return $this->parent_id;
    }
    function toArray()
    {
        $result = [];
        foreach ($this as $key => $value) {
            $result[$key] =  $value;
        }
        return $result;
    }
}

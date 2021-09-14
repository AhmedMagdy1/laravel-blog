<?php

namespace App\Entity\Blog;

use App\Entity\Entity;

class Tag extends Entity
{
    protected $title;

    public function __construct($id , $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

}

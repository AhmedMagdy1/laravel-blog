<?php

namespace App\Service\Blog;

use App\Models\Blog\Tag;

class TagService
{
    function getAll()
    {
        return Tag::all();
    }
}

<?php

namespace App\Service\Blog;

use App\Http\Helpers\Lookups;
use App\Models\Blog\Tag;

class TagService
{
    function getAll()
    {
        return Tag::all();
    }
    function getLookups()
    {
        $tags = $this->getAll();
        return Lookups::format($tags, 'id', 'title');
    }

    function findOrCreate($tags)
    {
        $result = [];
        foreach ($tags as $tag)
        {
            array_push($result,
                (is_numeric($tag->getId())) ? Tag::find($tag->getId()) : Tag::firstOrCreate($tag->toArray()));
        }
        return $result;
    }
}

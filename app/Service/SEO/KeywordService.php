<?php

namespace App\Service\SEO;

use App\Models\SEO\Keyword;

class KeywordService
{
    function create($keywords)
    {
        return Keyword::insert($keywords);

    }
}

<?php

namespace App\Service\SEO;

use App\Models\SEO\Keyword;

class KeywordService
{
    function removeAll($keywordGroupId)
    {
        return Keyword::where('keyword_group_id', $keywordGroupId)->delete();
    }

    function create($keywords, $keywordGroupObject, $keywordGroupId )
    {
        $keywordLines = $this->buildKeywordsObject($keywords, $keywordGroupId);
        $keywordGroupObject->addKeywordsLines($keywordLines);
        $this->store($keywordGroupObject->getKeywords());
    }

    private function buildKeywordsObject($keywords, $keywordGroupId)
    {
        foreach ($keywords as $key => $keyword)
        {
            $keywords[$key]['keyword_group_id'] = $keywordGroupId;
            $keywords[$key]['created_at'] = date('Y-m-d H:i:s');
        }
        return $keywords;
    }

    function store($keywords)
    {
        return Keyword::insert($keywords);
    }

    function edit($keywordGroupObject, $KeywordGroupId)
    {
        $this->removeAll($KeywordGroupId);
        $this->store($keywordGroupObject->getKeywords());
    }
}

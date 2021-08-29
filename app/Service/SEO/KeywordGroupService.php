<?php

namespace App\Service\SEO;


use App\Entity\SEO\KeywordGroup as KeywordGroupEntity;
use App\Models\SEO\KeywordGroup as KeywordGroupModel;

class KeywordGroupService
{
    function buildObject($data)
    {
        $createdBy = auth()->user()->id;
        return new KeywordGroupEntity($data['main_keyword'], $createdBy, $data['assigned_to'], $data['notes']);
    }
    function create($data)
    {
        return $this->store($data);
    }

    private function store(KeywordGroupEntity $group)
    {
        return KeywordGroupModel::create($group->toArray(['id']));
    }

}

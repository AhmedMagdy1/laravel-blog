<?php

namespace App\Service\SEO;


use App\Entity\SEO\KeywordGroup as KeywordGroupEntity;
use App\Models\SEO\KeywordGroup as KeywordGroupModel;

class KeywordGroupService
{
    function create($data)
    {
        $group = new KeywordGroupEntity($data['main_keyword'], $data['created_by'], $data['assigned_to']);
        return $this->store($group);
    }

    function store(KeywordGroupEntity $group)
    {
        return KeywordGroupModel::create($group->toArray(['id']));
    }

}

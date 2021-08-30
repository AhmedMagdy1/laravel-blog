<?php

namespace App\Service\SEO;


use App\Entity\SEO\KeywordGroup as KeywordGroupEntity;
use App\Models\SEO\KeywordGroup as KeywordGroupModel;

class KeywordGroupService
{
    function buildObject($data)
    {
        $createdBy = auth()->user()->id;
        $id = isset($data['id'])? $data['id'] : null;
        return new KeywordGroupEntity($data['main_keyword'], $createdBy, $data['assigned_to'], $data['notes'], $id);
    }

    function create($data)
    {
        return $this->store($data);
    }

    private function store(KeywordGroupEntity $group)
    {
        return KeywordGroupModel::create($group->toArray(['id']));
    }

    public function getPaginated()
    {
        return KeywordGroupModel::orderBy('id', 'desc')->paginate(20);
    }

    public function getWithKeywordsLines($id)
    {
        return KeywordGroupModel::with('keywords')->findOrFail($id)->toArray();
    }
    public function update($group ,$id)
    {
        return KeywordGroupModel::find($id)->update($group->toArray(['id', 'keywords']));
    }

}

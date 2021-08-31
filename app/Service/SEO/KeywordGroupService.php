<?php

namespace App\Service\SEO;


use App\Entity\SEO\KeywordGroup as KeywordGroupEntity;
use App\Models\SEO\KeywordGroup as KeywordGroupModel;
use Illuminate\Http\Request;

class KeywordGroupService
{

    function create($data)
    {
        $keywordGroupObject = $this->buildObject($data);
        $keywordGroup = $this->store($keywordGroupObject);
        $keywordService = new KeywordService;
        $keywordService->create($data->keywords, $keywordGroupObject, $keywordGroup->id);
    }

    function buildObject($data)
    {
        $createdBy = auth()->user()->id;
        $id = isset($data['id'])? $data['id'] : null;
        return new KeywordGroupEntity($data['main_keyword'], $createdBy, $data['assigned_to'], $data['notes'], $id);
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

    public function edit($data, $id)
    {
        $keywordGroupObject = $this->buildObject($data + ['id' =>$id]);
        $keywordGroupObject->addKeywordsLines($data['keywords']);
        $this->update($keywordGroupObject, $id);
        $keywordService = new KeywordService;
        $keywordService->edit($keywordGroupObject, $id);
    }

    public function update($group ,$id)
    {
        return KeywordGroupModel::find($id)->update($group->toArray(['id', 'keywords']));
    }

    public function getAll()
    {
        return KeywordGroupModel::all();
    }

}

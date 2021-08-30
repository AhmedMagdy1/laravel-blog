<?php

namespace App\Http\Controllers\SEO;

use App\Entity\SEO\KeywordGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\SEO\CreateKeywordGroup;
use App\Service\Auth\UserService;
use App\Service\SEO\KeywordGroupService;
use App\Service\SEO\KeywordService;
use Illuminate\Http\Request;

class KeywordGroupController extends Controller
{
    private $keywordGroupService, $keywordService;
    public function __construct( KeywordGroupService $keywordGroupService, KeywordService $keywordService)
    {
        $this->keywordGroupService = $keywordGroupService;
        $this->keywordService = $keywordService;
    }

    public function index()
    {
        $keywordGroups = $this->keywordGroupService->getPaginated();
        return view('admin.keyword-groups.list.index', compact('keywordGroups'));

    }

    public function create()
    {
        $userService = new UserService;
        $users = $userService->getAll();
        $keywordGroupObject = new KeywordGroup;
        return view('admin.keyword-groups.create.index', compact('users', 'keywordGroupObject'));
    }

    public function store(CreateKeywordGroup $request)
    {
        $keywordGroupObject = $this->keywordGroupService->buildObject($request);
        $keywordGroup = $this->keywordGroupService->create($keywordGroupObject);
        $keywordGroupObject = $this->buildKeywordsObject($request, $keywordGroup, $keywordGroupObject);
        $this->keywordService->create($keywordGroupObject->getKeywords());
        return redirect('/admin/keyword-group');
    }

    private function buildKeywordsObject(Request $request, $keywordGroup, $keywordGroupObject)
    {
        $keywordLines = $this->formatKeywordLines($request->keywords, $keywordGroup->id);
        $keywordGroupObject->addKeywordsLines($keywordLines);
        return $keywordGroupObject;
    }

    private function formatKeywordLines($keywords, $keywordGroupId)
    {
        foreach ($keywords as $key => $keyword)
        {
            $keywords[$key]['keyword_group_id'] = $keywordGroupId;
            $keywords[$key]['created_at'] = date('Y-m-d H:i:s');
        }
        return $keywords;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $userService = new UserService;
        $users = $userService->getAll();
        $keywordGroupData = $this->keywordGroupService->getWithKeywordsLines($id);
        $keywordGroupObject = $this->keywordGroupService->buildObject($keywordGroupData);
        $keywordGroupObject->addKeywordsLines($keywordGroupData['keywords']);
        return view('admin.keyword-groups.create.index', compact('users', 'keywordGroupObject'));
    }

    public function update(CreateKeywordGroup $request, $id)
    {
        $keywordGroupObject = $this->keywordGroupService->buildObject($request->all() + ['id' =>$id]);
        $keywordGroupObject->addKeywordsLines($request['keywords']);
        $this->keywordGroupService->update($keywordGroupObject, $id);
        $this->keywordService->removeAll($id);
        $this->keywordService->create($keywordGroupObject->getKeywords());
        return redirect('/admin/keyword-group');
    }

    public function destroy($id)
    {
        //
    }
}

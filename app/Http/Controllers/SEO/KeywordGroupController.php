<?php

namespace App\Http\Controllers\SEO;

use App\Http\Controllers\Controller;
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
        return view('admin.keyword-groups.list.index', compact('categories'));

    }

    public function create()
    {
        $userService = new UserService;
        $users = $userService->getAll();
        return view('admin.keyword-groups.create.index', compact('users'));
    }

    public function store(Request $request)
    {
        $keywordGroupObject = $this->keywordGroupService->buildObject($request);
        $keywordGroup = $this->keywordGroupService->create($keywordGroupObject);
        $keywordGroupObject = $this->buildKeywordsObject($request, $keywordGroup, $keywordGroupObject);
        $this->keywordService->create($keywordGroupObject);
        return redirect('/admin/keyword-group');
    }

    private function formatKeywordLines($keywords, $keywordGroupId, $keywordGroupObject)
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    private function buildKeywordsObject(Request $request, $keywordGroup, $keywordGroupObject)
    {
        $keywordLines = $this->formatKeywordLines($request->keywords, $keywordGroup->id, $keywordGroupObject);
        $keywordGroupObject->addKeywordsLines($keywordLines);
        return $keywordGroupObject;
    }
}

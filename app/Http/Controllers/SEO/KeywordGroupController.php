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
        $keywordGroup = $this->keywordGroupService->create($request->all() + ['created_by' => auth()->user()->id]);
        $keywordLines = $this->formatKeywordLines($request->keywords, $keywordGroup->id);
        $this->keywordService->create($keywordLines);
        return redirect('/admin/keyword-group');
    }

    private function formatKeywordLines($keywords, $keywordGroupId)
    {
        foreach ($keywords as $key => $keyword)
        {
            $keywords[$key]['keyword_group_id'] = $keywordGroupId;
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
}

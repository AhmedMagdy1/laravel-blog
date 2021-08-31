<?php

namespace App\Http\Controllers\SEO;

use App\Entity\SEO\KeywordGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\SEO\CreateKeywordGroup;
use App\Service\Auth\UserService;
use App\Service\SEO\KeywordGroupService;
use App\Service\SEO\KeywordService;

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
        $this->keywordGroupService->create($request);
        return redirect('/admin/keyword-group');
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
        $this->keywordGroupService->edit($request->all(), $id);
        return redirect('/admin/keyword-group');
    }
}

<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Service\Blog\CategoryService;
use App\Service\Blog\PostService;
use App\Service\Blog\StatusService;
use App\Service\Blog\TagService;
use App\Service\SEO\KeywordGroupService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    private $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
    }

    public function create()
    {
        $status  = new StatusService;
        $statuses = $status->getLookups();
        $category = new CategoryService;
        $categories = $category->getLookups();
        $tagService = new TagService;
        $tags = $tagService->getLookups();
        $keywords = new KeywordGroupService;
        $keywordsGroups = $keywords->getLookups();
        return view('admin.posts.post-form.create', compact('statuses', 'categories', 'tags', 'keywordsGroups'));
    }

    public function store(Request $request)
    {
        $this->postService->create($request->all());
//        return Redirect::back()->withMessage('Profile saved!');
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

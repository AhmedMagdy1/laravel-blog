<?php

namespace App\Http\Controllers\Blog;

use App\Entity\Blog\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CreateCategory;
use App\Service\Blog\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getPaginated();
        return view('admin.category.list.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();
        $categories = $this->categoryService->getLookups();
        return view('admin.category.form.index', compact('category', 'categories'));
    }

    public function store(CreateCategory $request)
    {
        $category = new Category($request);
        $this->categoryService->store($category);
        return redirect('/admin/category');
    }

    public function edit($id)
    {
        $category = $this->categoryService->get($id);
        $categoryEntity = new Category($category);
        $categories = $this->categoryService->getLookups();
        return view('admin.category.form.index', ['category' => $categoryEntity, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $categoryEntity = new Category($request);
        $this->categoryService->update($categoryEntity, $id);
        return redirect('/admin/category');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    private $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->middleware('auth');
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        $categories = $this->categoryRepository->index();
        return view("category.index", compact("categories"));
    }

    public function create() {
        return view('category.create');
    }

    public function store(CategoryCreateRequest $request) {
        $validatedData = $request->Validated();
        $this->categoryRepository->create($validatedData, $request);
        return redirect()->route('category.list');
    }

    public function show($id) {
        $category = $this->categoryRepository->show($id);
        return view("category.show", compact("category"));
    }

    public function delete($id) {
        $this->categoryRepository->delete($id);
        return redirect()->route('category.list');
    }

    public function edit($id) {
        $category = $this->categoryRepository->show($id);
        return view('category.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $id) {
        $validatedData = $request->validated();
        $this->categoryRepository->update($validatedData, $request, $id);
        return redirect()->route('category.list');
    }
}

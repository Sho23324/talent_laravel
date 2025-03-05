<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends BaseController
{
    private $categoryRepo;
    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
    public function index() {
        $categories = $this->categoryRepo->getCategories();
        return $this->success($categories, "Success", 200);
    }

    public function show($id) {
        $category = $this->categoryRepo->getCategoryById($id);
        return $this->success($category, "Category Details", 200);
    }

    public function store(CategoryCreateRequest $request) {
        $validatedData = $request->validated();
        $category = $this->categoryRepo->create($validatedData);
        return $this->success($category, "Product created successfully", 201);
    }

    public function delete($id) {
        $category = $this->categoryRepo->delete($id);
        return $this->success($category, "Category delete successfully");
    }
}

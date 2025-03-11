<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\CategoryCreateRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use Exception;

class CategoryController extends BaseController
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index() {
        $categories = $this->categoryRepository->index();
        return $this->success($categories, "Success", 200);
    }

    public function show($id) {
        try {
            $category = $this->categoryRepository->show($id);
            return $this->success($category, "Category Details", 200);
        }catch(Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Category Not Found", null,  404);
        }
    }

    public function store(CategoryCreateRequest $request) {
        $validatedData = $request->validated();
        $category = $this->categoryRepository->create($validatedData, $request);
        return $this->success($category, "Product created successfully", 201);
    }

    public function update(CategoryCreateRequest $request, $id) {
        $validatedData = $request->validated();
        try {
            $category = $this->categoryRepository->update($validatedData, $request, $id);
            return $this->success($category, "Category updated successfully", 200);
        }catch(Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Category Not Found", null, 404);
        }
    }

    public function delete($id) {
        try {
            $category = $this->categoryRepository->delete($id);
            return $this->success($category, "Category delete successfully");
        }catch(Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Category Not Found", null, 404);
        }
    }
}

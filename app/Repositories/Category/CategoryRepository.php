<?php
namespace App\Repositories\Category;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface {
    public function getCategories() {
        return Category::all();
    }

    public function getCategoryById($category_id) {
        return Category::find($category_id);
    }

    public function create($category) {
        return Category::create($category);
    }

    public function delete($id) {
        $category = Category::find($id);
        return $category->delete();
    }
}

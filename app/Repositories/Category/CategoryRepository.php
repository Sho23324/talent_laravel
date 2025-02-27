<?php
namespace App\Repositories\Category;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface {
    public function getCategories() {
        $categories = Category::all();
        return $categories;
    }

    public function getCategoryById($category_id) {
        $category = Category::find($category_id);
        return $category;
    }
    public function create($category) {
        return Category::create($category);
    }
}

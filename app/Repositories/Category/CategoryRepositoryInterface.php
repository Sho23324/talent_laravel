<?php
namespace App\Repositories\Category;

interface CategoryRepositoryInterface {
    public function getCategories();
    public function getCategoryById($category_id);
    public function create($category);
}

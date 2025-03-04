<?php
namespace App\Repositories\Product;

interface ProductRepositoryInterface {
    public function getProducts();
    public function getProductById($product_id) ;
    public function create($product);
    public function getCategoryProduct($id);
    public function getActiveProducts();
    public function getProductImagesByProductId($id);
}

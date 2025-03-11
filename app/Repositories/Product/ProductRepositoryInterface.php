<?php
namespace App\Repositories\Product;

interface ProductRepositoryInterface {
    public function index();
    public function show($id) ;
    public function create($product);
    public function getCategoryProduct($id);
    public function update($validatedData, $id);
    public function delete($id);
    public function getProductImagesByProductId($id);
}

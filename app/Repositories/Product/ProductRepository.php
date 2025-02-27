<?php
namespace App\Repositories\Product;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface {
    public function getProducts() {
        $products = Product::all();
        return $products;
    }

    public function getProductById($product_id) {
        $product = Product::find($product_id);
        return $product;
    }

    public function create($product) {
        return Product::create($product);
    }

    public function getCategoryProduct($id) {
        return Product::with('category')->where('id', $id)->first();
    }
}

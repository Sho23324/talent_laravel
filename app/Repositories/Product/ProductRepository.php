<?php
namespace App\Repositories\Product;

use App\Models\Product;
use App\Models\ProductImage;

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

    public function getActiveProducts() {
        return Product::where('status', 1)->get();
    }

    public function getProductImagesByProductId($id) {
        return Product::with('images')->where('id', $id)->first();
    }
}

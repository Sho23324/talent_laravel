<?php
namespace App\Repositories\Product;

use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {
    public function index() {
        $roleName = Auth::user()->roles->pluck('name');
        if ($roleName->contains('admin')) {
            $products = Product::all();
        } elseif($roleName->contains('guest')){
            $products = Product::where('status', 1)->get();
        }
        return $products;
    }

    public function show($id) {
        $product = Product::find($id);
        if(!$product) {
            throw new Exception("Product Not Found", 404);
        }
        return $product;
    }

    public function create($product) {
        return Product::create($product);
    }

    public function getCategoryProduct($id) {
        return Product::with('category')->where('id', $id)->first();
    }

    public function getProductImagesByProductId($id) {
        return Product::with('images')->where('id', $id)->first();
    }

    public function update($validatedData, $id) {
        $product = Product::find($id);
        if(!$product) {
            throw new Exception("Product Not Found", 404);
        }
        return $product->update($validatedData);
    }

    public function delete($id) {
        $product = Product::find($id);
        if(!$product) {
            throw new Exception("Product Not Found", 404);
        }
        return $product->delete();
    }
}

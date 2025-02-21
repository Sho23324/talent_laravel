<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view("product.index", compact("products"));
    }

    public function detail($id) {
        $product = Product::find($id);
        return view("product.show", compact("product"));
    }
}

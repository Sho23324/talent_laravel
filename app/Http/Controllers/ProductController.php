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

    public function create() {
        return view('product.create');
    }

    public function store(Request $request) {
        Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price
        ]);
        return redirect()->route('products.index');
    }

    public function delete($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function edit($id) {
        $product = Product::find($id);
        return view('product.edit', ['product'=>$product]);
    }

    public function update(Request $request) {
        $product = Product::find($request->id);
        $product->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price
        ]);
        return redirect()->route('products.index');
    }
}


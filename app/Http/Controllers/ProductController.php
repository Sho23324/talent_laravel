<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
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

    public function store(ProductStoreRequest $request) {
        $validatedData = $request->validated();
        if($request['status'] == 'active') {
            $validatedData = array_merge($validatedData,['status'=>true]);
        }
        Product::create($validatedData);
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

    public function update(ProductStoreRequest $request) {
        $product = Product::find($request->id);
        $validatedData = $request->validated();
        if($request['status']) {
            $validatedData = array_merge($validatedData,['status'=>true]);
        }else {
            $validatedData = array_merge($validatedData,['status'=>false]);
        }

        $product->update($validatedData);
        return redirect()->route('products.index');
    }
}


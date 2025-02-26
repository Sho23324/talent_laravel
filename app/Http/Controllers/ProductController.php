<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view("product.index", compact("products"));
    }

    public function detail($id) {
        $categories = Category::all();
        $product = Product::find($id);
        return view("product.show", compact("product"), compact('categories'));
    }

    public function create() {
        $categories = Category::get();
        return view('product.create', compact('categories'));
    }

    public function store(ProductStoreRequest $request) {
        $validatedData = $request->validated();
        if($request['status'] == 'active') {
            $validatedData = array_merge($validatedData,['status'=>true]);
        }
        if($request->hasFile('image')) {
            $imageName =  time() . '.' .$request->image->extension();
            $request->image->move(public_path('productImage'), $imageName);
            $validatedData = array_merge($validatedData, ['image'=>$imageName]);
        }
        Product::create($validatedData);
        return redirect()->route('products.index');
    }

    public function delete($id) {
        $product = Product::find($id);
        $image = public_path('productImage/') . $product->image;
        Storage::delete($image);
        unlink($image);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function edit($id) {
        $categories = Category::all();
        $product = Product::with('category')->where('id', $id)->first();
        return view('product.edit', ['product'=>$product], compact('categories'));
    }

    public function update(ProductStoreRequest $request) {
        $product = Product::find($request->id);

        $validatedData = $request->validated();
        if($request['status']) {
            $validatedData = array_merge($validatedData,['status'=>true]);
        }else {
            $validatedData = array_merge($validatedData,['status'=>false]);
        }
        if($request->hasFile('image')) {
            $oldImage =  public_path('productImage/'). $product->image;
            Storage::delete($oldImage);
            unlink($oldImage);
            $imageName =  time() . '.' .$request->image->extension();
            $request->image->move(public_path('productImage'), $imageName);
            $validatedData = array_merge($validatedData, ['image'=>$imageName]);
        }

        $product->update($validatedData);
        return redirect()->route('products.index');
    }
}


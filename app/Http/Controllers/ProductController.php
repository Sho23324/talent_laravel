<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $productRepo;
    private $categoryRepo;
    public function __construct(ProductRepositoryInterface $productRepo, CategoryRepositoryInterface $categoryRepo)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }
    public function index() {
        $products = $this->productRepo->getProducts();
        return view("product.index", compact("products"));
    }

    public function detail($id) {
        $categories = $this->categoryRepo->getCategories();
        $product = $this->productRepo->getProductById($id);
        return view("product.show", compact("product"), compact('categories'));
    }

    public function create() {
        $categories = $this->categoryRepo->getCategories();
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
        $this->productRepo->create($validatedData);
        return redirect()->route('products.index');
    }

    public function delete($id) {
        $product = $this->productRepo->getProductById($id);
        $image = public_path('productImage/') . $product->image;
        Storage::delete($image);
        unlink($image);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function edit($id) {
        $categories = $this->categoryRepo->getCategories();
        $product = $this->productRepo->getCategoryProduct($id);
        return view('product.edit', ['product'=>$product], compact('categories'));
    }

    public function update(ProductUpdateRequest $request) {
        $product = $this->productRepo->getProductById($request->id);

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


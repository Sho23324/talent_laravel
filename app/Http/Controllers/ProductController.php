<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductImageRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ProductImage\ProductImageRepositoryInterface;
use App\Services\Product\ProductService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    private $productRepo;
    private $categoryRepo;
    private $productService;
    private $productImageRepo;

    public function __construct(ProductRepositoryInterface $productRepo, CategoryRepositoryInterface $categoryRepo, ProductService $productService, ProductImageRepositoryInterface $productImageRepo)
    {
        $this->middleware('auth');
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
        $this->productService = $productService;
        $this->productImageRepo = $productImageRepo;
    }

    public function index() {
        $roleName = Auth::user()->roles->pluck('name');
        if($roleName->contains('admin')) {
            $products = $this->productRepo->getProducts();
        }
        if($roleName->contains('guest')){
            $products = $this->productRepo->getActiveProducts();
        }

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
        // if($request->hasFile('image')) {
        //     $imageName =  time() . '.' .$request->image->extension();
        //     $request->image->move(public_path('productImage'), $imageName);
        //     $validatedData = array_merge($validatedData, ['image'=>$imageName]);
        // }
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

    public function status($id) {
        $this->productService->status($id);
        return redirect()->route('products.index');
    }

    //image store

    public function imgForm($id) {
        $product = $this->productRepo->getProductById($id);
        $productImages = $this->productRepo->getProductImagesByProductId($product->id);
        return view('product.imageForm', compact('product', 'productImages'));
    }

    public function storeImg(ProductImageRequest $request) {
        $validatedData = $request->validated();
        $imageName =  time() . '.' .$request->image->extension();
        $request->image->move(public_path('productImage'), $imageName);
        $validatedData = array_merge($validatedData, ['image'=>$imageName]);
        $this->productService->storeImg($validatedData);
        return redirect()->route('products.index');
    }

    public function deleteImg($id) {
        $this->productImageRepo->delete($id);
        return redirect()->route('products.index');
    }
}


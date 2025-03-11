<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductImageRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ProductImage\ProductImageRepositoryInterface;
use App\Services\Product\ProductService;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;
    private $productService;
    private $productImageRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository, ProductService $productService, ProductImageRepositoryInterface $productImageRepository)
    {
        $this->middleware('auth');
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productService = $productService;
        $this->productImageRepository = $productImageRepository;
    }

    public function index() {
        $products = $this->productRepository->index();
        return view("product.index", compact("products"));
    }

    public function detail($id) {
        $categories = $this->categoryRepository->index();
        $product = $this->productRepository->show($id);
        return view("product.show", compact("product"), compact('categories'));
    }

    public function create() {
        $categories = $this->categoryRepository->index();
        return view('product.create', compact('categories'));
    }

    public function store(ProductStoreRequest $request) {
        $validatedData = $request->validated();
        $validatedData = array_merge($validatedData,[ 'status'=> $request['status'] == 'active' ? true : false]);
        $this->productRepository->create($validatedData);
        return redirect()->route('products.index');
    }

    public function delete($id) {
        $this->productRepository->delete($id);
        return redirect()->route('products.index');
    }

    public function edit($id) {
        $categories = $this->categoryRepository->index();
        $product = $this->productRepository->getCategoryProduct($id);
        return view('product.edit', ['product'=>$product], compact('categories'));
    }

    public function update(ProductUpdateRequest $request) {
        $validatedData = $request->validated();
        $this->productRepository->update($validatedData,$request->id);
        return redirect()->route('products.index');
    }

    public function status($id) {
        $this->productService->status($id);
        return redirect()->route('products.index');
    }

    //image store

    public function imgForm($id) {
        $product = $this->productRepository->show($id);
        $productImages = $this->productRepository->getProductImagesByProductId($product->id);
        return view('product.imageForm', compact('product', 'productImages'));
    }

    public function storeImg(ProductImageRequest $request) {
        $validatedData = $request->validated();
        $this->productImageRepository->create($validatedData, $request);
        return redirect()->route('products.index');
    }

    public function deleteImg($id) {
        $this->productImageRepository->delete($id);
        return redirect()->route('products.index');
    }
}


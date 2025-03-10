<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    private $productRepo;
    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public function index() {
        $products = $this->productRepo->getProducts();
        return $this->success($products, 'Products retrieved successsfully', 200);
    }

    public function show($id) {
        $product = $this->productRepo->getProductById($id);
        return $this->success($product, 'Product Details', 200);
    }

    public function store(ProductStoreRequest $request) {
        $validatedData = $request->validated();
        $product = $this->productRepo->create($validatedData);
        return $this->success($product, 'Product Created Successfully', 201);
    }

    public function update($id, ProductStoreRequest $request) {
        $validatedData = $request->validated();
        $product = $this->productRepo->getProductById($id);
        $product->update($validatedData);
        return $this->success($product, "Product Updated Successfully", 200);
    }

    public function delete($id) {
        $product = $this->productRepo->deleteProductsById($id);
        return $this->success($product, "Product delete Successful", 204);
    }

}

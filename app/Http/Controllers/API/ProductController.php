<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ProductStoreRequest;
use App\Repositories\Product\ProductRepositoryInterface;
use Exception;

class ProductController extends BaseController
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index() {
        $products = $this->productRepository->index();
        return $this->success($products, 'Products retrieved successsfully', 200);
    }

    public function show($id) {
        try {
            $product = $this->productRepository->show($id);
            return $this->success($product, 'Product Details', 200);
        }catch (Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Product Not Found", null, 500);
        }
    }

    public function store(ProductStoreRequest $request) {
        try {
            $validatedData = $request->validated();
            $product = $this->productRepository->create($validatedData);
            return $this->success($product, 'Product Created Successfully', 201);
        }catch (Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Product Not Found", null, 500);
        }
    }

    public function update(ProductStoreRequest $request, $id) {
        $validatedData = $request->validated();
        try {
            $product = $this->productRepository->update($validatedData, $id);
            return $this->success($product, "Product Updated Successfully", 200);
        }catch (Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Product Not Found", null, 500);
        }
    }

    public function delete($id) {
        try {
            $product = $this->productRepository->show($id);
            return $this->success($product, "Product delete Successful", 204);
        }catch (Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Product Not Found", null, 500);
        }
    }

}

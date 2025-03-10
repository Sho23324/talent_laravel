<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImageRequest;
use App\Repositories\ProductImage\ProductImageRepositoryInterface;
use Illuminate\Http\Request;

class ProductImageController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    private $productImageRepo;
    public function __construct(ProductImageRepositoryInterface $productImageRepo)
    {
        $this->productImageRepo = $productImageRepo;
    }
    public function index()
    {
        $productImages = $this->productImageRepo->getProductImages();
        return $this->success($productImages, "Product images retrieved successfully", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductImageRequest $request)
    {
        $validatedData = $request->validated();
        $imageName = time(). '.' . $request->image->extension();
        $request->image->move(public_path('productImage'), $imageName);
        $validatedData = array_merge($validatedData, ['image'=>$imageName]);
        $productImage = $this->productImageRepo->create($validatedData);
        return $this->success($productImage, "Product image inserted successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productImages = $this->productImageRepo->getProductImageById($id);
        return $this->success($productImages, "Product images by product id", 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productImage = $this->productImageRepo->delete($id);
        return $this->success($productImage, "Product image deleted successfully", 204);
    }
}

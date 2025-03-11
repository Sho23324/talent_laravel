<?php

namespace App\Http\Controllers\API;
use App\Http\Requests\ProductImageRequest;
use App\Repositories\ProductImage\ProductImageRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class ProductImageController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    private $productImageRepository;

    public function __construct(ProductImageRepositoryInterface $productImageRepository)
    {
        $this->productImageRepository = $productImageRepository;
    }

    public function index()
    {
        $productImages = $this->productImageRepository->index();
        return $this->success($productImages, "Product images retrieved successfully", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductImageRequest $request)
    {
        $validatedData = $request->validated();
        $productImage = $this->productImageRepository->create($validatedData, $request);
        return $this->success($productImage, "Product image inserted successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $productImages = $this->productImageRepository->show($id);
            return $this->success($productImages, "Product images by product id", 200);
        }catch (Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Product Not Found", null, 404);
        }
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
        try {
            $productImage = $this->productImageRepository->delete($id);
            return $this->success($productImage, "Product image deleted successfully", 204);
        }catch (Exception $e) {
            return $this->error($e->getMessage() ? $e->getMessage() : "Product Not Found", null, 404);
        }
    }
}

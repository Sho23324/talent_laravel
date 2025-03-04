<?php
namespace App\Repositories\ProductImage;

use App\Http\Requests\ProductImageRequest;
use App\Models\ProductImage;

interface ProductImageRepositoryInterface {
    public function getProductImages();
    public function create(ProductImageRequest $request);
    public function delete($id);
}

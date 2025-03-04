<?php

namespace App\Repositories\ProductImage;

use App\Http\Requests\ProductImageRequest;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImageRepository implements ProductImageRepositoryInterface{
    public function getProductImages() {
        return ProductImage::all();
    }

    public function create(ProductImageRequest $request) {
        return ProductImage::create($request);
    }

    public function delete($id) {
        $productImage = ProductImage::find($id);
        $image = public_path('productImage/') . $productImage->image;
        Storage::delete($image);
        unlink($image);
        return $productImage->delete();
    }
}

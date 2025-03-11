<?php

namespace App\Repositories\ProductImage;

use App\Models\Product;
use App\Models\ProductImage;
use Exception;
use Illuminate\Support\Facades\Storage;
use App\Repositories\ProductImage\ProductImageRepositoryInterface;

class ProductImageRepository implements ProductImageRepositoryInterface{
    public function index() {
        return ProductImage::all();
    }

    public function create($validatedData, $request) {
        $imageName = time(). '.' . $request->image->extension();
        $request->image->move(public_path('productImage'), $imageName);
        $validatedData = array_merge($validatedData, ['image'=>$imageName]);
        return ProductImage::create($validatedData);
    }

    public function show($id) {
        $productImage = ProductImage::find($id);
        if(!$productImage) {
            throw new Exception("ProductImage Not Found", 404);
        }
        return $productImage;
    }

    public function getProductImageByProductId($id) {
        return Product::with('images', $id)->first();
    }

    public function delete($id) {
        $productImage = ProductImage::find($id);
        if(!$productImage) {
            throw new Exception("ProductImage Not Found", 404);
        }
        $image = public_path('productImage/') . $productImage->image;
        Storage::delete($image);
        unlink($image);
        return $productImage->delete();
    }
}

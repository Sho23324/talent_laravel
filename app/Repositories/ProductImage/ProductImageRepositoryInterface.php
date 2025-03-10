<?php
namespace App\Repositories\ProductImage;

interface ProductImageRepositoryInterface {
    public function getProductImages();
    public function getProductImageById($id);
    public function create($request);
    public function getProductImageByProductId($id);
    public function delete($id);
}

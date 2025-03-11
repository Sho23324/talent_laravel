<?php
namespace App\Repositories\ProductImage;

interface ProductImageRepositoryInterface {
    public function index();
    public function show($id);
    public function create($validatedData, $request);
    public function getProductImageByProductId($id);
    public function delete($id);
}

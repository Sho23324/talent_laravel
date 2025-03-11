<?php
namespace App\Services\Product;

use App\Repositories\Product\ProductRepositoryInterface;

class ProductService {
    private $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function status($id) {
        $product = $this->productRepo->show($id);
        if($product->status == 1) {
            $product->status = 0;
        }else {
            $product->status = 1;
        }
        $product->save();
    }
}

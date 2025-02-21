<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ["name"=>"Laptop", "description"=>"this is laptop", "price" => 1500000],
            ["name"=>"Mobile phone", "description"=>"this is mobil phone", "price" => 600000],
            ["name"=>"Apple", "description"=>"this is apple", "price" => 1500],
            ["name"=>"Chips", "description"=>"this is chips", "price" => 2000],
            ["name"=>"Bottle", "description"=>"this is bottle", "price" => 600]
        ];
        foreach($products as $product) {
             Product::create($product);
        }
    }
}

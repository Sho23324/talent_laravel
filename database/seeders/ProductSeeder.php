<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ["category_id"=>1, "name"=>"Laptop", "description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt exercitationem optio quidem enim eaque ex impedit quam nesciunt qui. Nesciunt ipsum natus at totam adipisci. Voluptatem qui repellat quisquam exercitationem.", "price" => 1500000],
            ["category_id"=>2,"name"=>"Mobile phone", "description"=>"this is mobil phone", "price" => 600000],
            ["category_id"=>3,"name"=>"Apple", "description"=>"this is apple", "price" => 1500],
            ["category_id"=>4,"name"=>"Chips", "description"=>"this is chips", "price" => 2000],
            ["category_id"=>1,"name"=>"Bottle", "description"=>"this is bottle", "price" => 600]
        ];
        foreach($products as $product) {
            Product::create($product);
        }
    }
}

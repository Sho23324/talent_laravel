<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "id" => 1,
                "name" => "Food"
            ],
            [
                "id" => 2,
                "name" => "Drinks"
            ],
            [
                "id" => 3,
                "name" => "Health"
            ],
            [
                "id" => 4,
                "name" => "Care"
            ]
        ];
        foreach($categories as $category) {
            Category::create($category);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
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
        return view("category.index", compact("categories"));
    }
}

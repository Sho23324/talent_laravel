<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $articles = [
            ["id" => 1, "name" => "Enhancing Patient Care: The Role of Information Systems in Hospitals"],
            ["id" => 2, "name" => "Agile in Finance: How DSDM Transforms Banking IT Projects"],
            ["id" => 3, "name" => "Optimizing Hotel Operations for the Olympic Rush"],
            ["id" => 4, "name" => "Building a Scalable Online Bookstore: Key Considerations"],
            ["id" => 5, "name" => "E-Commerce UX: The Importance of a ‘Landmark’ Input Field"]
        ];
        return view("article.index", compact("articles"));
    }
}

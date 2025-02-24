<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::all();
        return view("article.index", ['articles'=>$articles]);
    }

    public function create() {
        return view('article.create');
    }

    public function store(Request $request) {
        Article::create([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        return redirect()->route('articles.list');
    }
}

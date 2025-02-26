<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("category.index", compact("categories"));
    }

    public function create() {
        return view('category.create');
    }

    public function store(CategoryCreateRequest $request) {
        $validatedData = $request->Validated();

        if($request->hasFile('image')) {
            $imageName =  time() . '.' .$request->image->extension();
            $request->image->move(public_path('categoryImage'), $imageName);
            $validatedData = array_merge($validatedData, ['image'=>$imageName]);
        }
        Category::create($validatedData);

        return redirect()->route('category.list');
    }

    public function show($id) {
        $category = Category::find($id);
        return view("category.show", compact("category"));
    }

    public function delete($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.list');
    }

    public function edit($id) {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request) {
        $category = Category::find($request->id);
        $category->update([
            'name'=>$request->name
        ]);
        return redirect()->route('category.list');
    }
}

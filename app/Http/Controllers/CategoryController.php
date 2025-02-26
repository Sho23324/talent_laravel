<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $image = public_path('categoryImage/') . $category->image;
        Storage::delete($image);
        unlink($image);
        $category->delete();
        return redirect()->route('category.list');
    }

    public function edit($id) {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(CategoryCreateRequest $request) {
        $category = Category::find($request->id);
        $validatedData = $request->validated();
        if($request->hasFile('image')) {
            $oldImage =  public_path('categoryImage/'). $category->image;
            Storage::delete($oldImage);
            unlink($oldImage);
            $imageName =  time() . '.' .$request->image->extension();
            $request->image->move(public_path('categoryImage'), $imageName);
            $validatedData = array_merge($validatedData, ['image'=>$imageName]);
        }

        $category->update($validatedData);
        return redirect()->route('category.list');
    }
}

<?php
namespace App\Repositories\Category;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface {
    public function index() {
        return Category::all();
    }

    public function show($id) {
        $category = Category::find($id);
        if(!$category) {
            throw new Exception("Category not found", 404);
        }
        return $category;
    }

    public function create($validatedData, $request) {
        if($request->hasFile('image')) {
            $imageName =  time() . '.' .$request->image->extension();
            $request->image->move(public_path('categoryImage'), $imageName);
            $validatedData = array_merge($validatedData, ['image'=>$imageName]);
        }
        return Category::create($validatedData);
    }

    public function update($validatedData, $request, $id) {
        $category = $this->show($id);
        if(!$category) {
            throw new Exception("Category Not Found", 404);
        }
        if($request->hasFile('image')) {
            $oldImage =  public_path('categoryImage/'). $category->image;
            Storage::delete($oldImage);
            unlink($oldImage);
            $imageName =  time() . '.' .$request->image->extension();
            $request->image->move(public_path('categoryImage'), $imageName);
            $validatedData = array_merge($validatedData, ['image'=>$imageName]);
        }
        return $category->update($validatedData);
    }

    public function delete($id) {
        $category = $this->show($id);
        if(!$category) {
            throw new Exception("Category Not Found", 404);
        }
        $image = public_path('categoryImage/') . $category->image;
        Storage::delete($image);
        unlink($image);
        return $category->delete();
    }
}

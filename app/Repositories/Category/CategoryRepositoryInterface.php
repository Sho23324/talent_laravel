<?php
namespace App\Repositories\Category;

interface CategoryRepositoryInterface {
    public function index();
    public function show($id);
    public function create($validatedData, $request);
    public function update($validatedData, $request, $id);
    public function delete($id);
}

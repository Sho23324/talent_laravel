<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductImageRequest;
use App\Repositories\ProductImage\ProductImageRepositoryInterface;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $productImageRepo;
    public function __construct(ProductImageRepositoryInterface $productImageRepo)
    {
        $this->productImageRepo = $productImageRepo;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductImageRequest $request)
    {
        $validatedData = $request->validated();
        $this->productImageRepo->create($validatedData);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Core\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductRepository $repository)
    {
        $products = $repository->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoryRepository $repository)
    {
        $categories = $repository->getAll();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = $request->validated();
        $product['img'] = FileHelper::storeFile($product['img'], 'public', $product['name']);

        Product::create($product);

        return redirect()->route('admin.products.index')->with('succes', 'Le produit à été créé avec succès !');
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
    public function edit(CategoryRepository $repository, Product $product)
    {
        $categories = $repository->getAll();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        if (isset($data['img'])) {
            $data['img'] = FileHelper::storeFile($data['img'], 'public', $data['name']);
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('succes', 'Le produit à été modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'le produits a été supprimé avec succès !');
    }
}

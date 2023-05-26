<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductRepository $repository)
    {
        $products = $repository->pagination(10);

        return view('front.pages.shop', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('front.pages.product-details', compact($product));
    }
}

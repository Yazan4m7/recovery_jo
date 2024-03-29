<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use App\Http\Resources\ProductResource ;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return new ProductCollection(Product::all());
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Product  $product
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Product $product)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Product  $product
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Product $product)
    // {
    //     //
    // }
}

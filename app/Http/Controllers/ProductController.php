<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
            "category" => "required",
            "price" => "required",
            "quantity" => "required",
            "description" => "required",
            "manufacturer"=> "required",
        ]);
        
        $product = Product::create($validated);

        return redirect()->route('dashboard')->with([
            'success' => 'Product added successfully.',
            'newProduct' => $product,
        ]);

    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('dashboard')->with('deleted', 'Product deleted successfully.');
    }

    public function edit(Product $product)
    {
        return view('edit-product', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            "name" => "required",
            "category" => "required",
            "price" => "required",
            "quantity" => "required",
            "description" => "required",
            "manufacturer"=> "required",
        ]);

        $product->update($validated);

        return redirect()->route('dashboard')->with('success', 'Product Updated Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    const PAGINATION = 5;
    public function index(Request $request)
    {
        $description = $request->get('description');
        $products = Product::where('status', '=', 1)->where('description', 'like', '%' . $description . '%')->paginate($this::PAGINATION);
        $description = '';
        return view('product.index', compact('products', 'description'));
    }

    public function create()
    {
        $categories = Category::where('status', '=', 1)->get();
        $units = Unit::where('status', '=', 1)->get();
        return view('product.create', compact('categories', 'units'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'description' => 'required|max:40|string',
                'price' => 'required|min:0|numeric',
                'stock' => 'required|min:0|numeric',
                'idcategory' => 'required',
                'idunit' => 'required',
            ],
            [
                'description.required' => 'Enter description',
                'description.max' => 'Maximum 40 characters for description',
                'price.required' => 'Enter a product price',
                'price.min' => 'Enter a valid product price',
                'stock.required' => 'Enter the product stock',
                'stock.min' => 'Enter a valid product stock',
            ]
        );
        $product = new Product($validated);
        $product->status = 1;
        $product->save();
        // dd($product);
        return redirect()->route('product.index')->with('alert', ['type' => 'succes', 'message' => 'Product saved successfully']);
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }
    public function destroy(Product $product)
    {
        //
    }
}

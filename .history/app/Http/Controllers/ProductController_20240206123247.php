<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(Auth::check());
        if(Auth::check()) {
            $products = Product::with('category', 'tags')
                    ->orderBy('id')->paginate(5);
            return view('product.index', compact('products'));
        }
        return redirect('login')->with('error', 'Please login to access products dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('product.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'nullable|exists:categories,id',
            'tag' => 'nullable|array'
        ]);
        $product = new Product([
            'name' => $request->input('name'),
            'price' => $request->input('price')
        ]);
        $category = Category::find($request->input('category'));
        $product->category()->associate($category);

        $product->save();

        $tags = $request->input('tags', []);
        $product->tags()->sync($tags);
        return redirect()->route('products.index')->with('success', 'Product has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('product.edit', compact('product', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            // 'category' => 'required|exists:categories,id',
            // 'tag' => 'array'
        ]);
        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price')
        ]);
        $category = Category::find($request->input('category'));
        $product->category()->associate($category);

        $product->save();

        $tags = $request->input('tags', []);
        $product->tags()->sync($tags);
        return redirect()->route('products.index')->with('success', 'Product Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->category) {
            return redirect()->route('products.index')->with('error', 'Product associated with category cannot be deleted');            
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product has been deleted successfully');
    }
}

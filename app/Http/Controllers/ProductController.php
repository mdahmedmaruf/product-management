<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $query->where('product_id', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $sortField = $request->query('sort_by', 'name');
        $sortDirection = $request->query('sort_direction', 'asc');
        $query->orderBy($sortField, $sortDirection);

        $products = $query->paginate(10);

        return view('products.index', compact('products', 'sortField', 'sortDirection'));
    }

    public function show(Product $product, $id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.show', compact('product'));
    }

    public function edit(Product $product, $id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|unique:products,product_id,' . $id, // Ensure unique except for this product
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'image' => 'nullable|image|max:2048'
        ]);

        $product = Product::findOrFail($id);

        $product->product_id = $request->input('product_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|unique:products',
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function create()
    {
        return view('products.create');
    }

    public function destroy(Product $product, $id)
    {
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        $product::where('id', $id)->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

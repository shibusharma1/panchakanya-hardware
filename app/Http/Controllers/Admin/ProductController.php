<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Product store request data:', $request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'is_top_selling' => 'nullable|boolean',
        ]);

        $data = $request->except('image');
        $data['slug'] = $this->createUniqueSlug($request->name);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_top_selling'] = $request->has('is_top_selling');

        // if ($request->hasFile('image')) {
        //     Log::info('Image file found in store request');
        //     $data['image'] = $request->file('image')->store('products', 'public');
        // } else {
        //     Log::info('No image file in store request');
        // }
        if ($request->hasFile('image')) {

            Log::info('Image file found in store request');

            $data['image'] = ImageService::upload(
                $request->file('image'),
                'products'
            );

            Log::info('Product image uploaded successfully', [
                'path' => $data['image']
            ]);
        } else {

            Log::info('No image file in store request');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
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
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        Log::info('Product update request data:', $request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'is_top_selling' => 'nullable|boolean',
        ]);

        $data = $request->except('image');
        $data['slug'] = $this->createUniqueSlug($request->name, $product->id);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_top_selling'] = $request->has('is_top_selling');

        // if ($request->hasFile('image')) {
        //     Log::info('Image file found in update request');
        //     if ($product->image) {
        //         Storage::disk('public')->delete($product->image);
        //     }
        //     $data['image'] = $request->file('image')->store('products', 'public');
        // } else {
        //     Log::info('No image file in update request');
        // }

        if ($request->hasFile('image')) {

            Log::info('Image file found in update request');

            $data['image'] = ImageService::update(
                $request->file('image'),
                'products',
                $product->image   // old image path
            );

            Log::info('Product image updated successfully', [
                'path' => $data['image']
            ]);
        } else {

            Log::info('No image file in update request');
        }
        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {

            ImageService::delete($product->image);

            Log::info('Product image deleted', [
                'path' => $product->image
            ]);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    private function createUniqueSlug($title, $id = 0)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}

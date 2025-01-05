<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['category', 'author'])->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.product.list', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.product.create', [
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Validator
        $rules = [
            'title' => 'required|min:5',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|min:10',
            'img' => 'required|mimes:jpeg,jpg,png,gif,svg|max:10000',
            'published_at' => 'required|date',
            'price' => 'required|numeric|min:0',
            'featured' => 'boolean',
            'status' => 'required|in:active,inactive',
        ];
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->route('product.create')->withInput()->withErrors($validator);
        }
        
        // Handle file upload
        $imageName = time().'.'.request()->img->getClientOriginalExtension();
        request()->img->move(public_path('product'), $imageName);
        
        $product = new Product();
        $product->title = $request->title;
        $product->author_id = $request->author_id;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->img = $imageName;
        $product->published_at = $request->published_at;
        $product->price = $request->price;
        $product->featured = $request->has('featured') ? true : false;
        $product->status = $request->status;

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with(['category', 'author'])->findOrFail($id);
        return view('admin.product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validator
        $rules = [
            'title' => 'required|min:5',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|min:10',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'required|date',
            'price' => 'required|numeric|min:0',
            'featured' => 'boolean',
            'status' => 'required|in:active,inactive',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('product.edit', $product->id)->withInput()->withErrors($validator);
        }

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('products', 'public');
            $product->img = $imagePath;
        }

        $product->title = $request->title;
        $product->author_id = $request->author_id;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->published_at = $request->published_at;
        $product->price = $request->price;
        $product->featured = $request->has('featured');
        $product->status = $request->status;

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product Deleted Successfully');
    }
}

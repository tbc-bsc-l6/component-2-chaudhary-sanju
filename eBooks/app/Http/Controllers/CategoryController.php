<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(1);
        return view('admin.category.list', [
            'categories' => $categories
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validator
        $rules = [
            'name' => 'required|min:5',
            'description' => 'required|min:10',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('category.create')->withInput()->withErrors($validator);
        }

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->has('status') ? 'active' : 'inActive';

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $category = Category::findOrFail($id);
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        // Validator
        $rules = [
            'name' => 'required|min:5',
            'description' => 'required|min:10',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('category.edit', $category->id)->withInput()->withErrors($validator);
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->has('status') ? 'active' : 'inActive';

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category Deleted Successfully');

    }
}

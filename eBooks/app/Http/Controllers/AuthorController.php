<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.author.list', [
            'authors' => $authors
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validator
        $rules = [
            'name' => 'required|min:5',
            'bio' => 'required|min:10',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('author.create')->withInput()->withErrors($validator);
        }

        $author = new Author();
        $author->name = $request->name;
        $author->bio = $request->bio;
        $author->status = $request->has('status') ? 'active' : 'inActive';

        $author->save();

        return redirect()->route('author.index')->with('success', 'Author Added Successfully');
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
        $author = Author::findOrFail($id);
        return view('admin.author.edit', [
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        // Validator
        $rules = [
            'name' => 'required|min:5',
            'bio' => 'required|min:10',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('author.edit', $author->id)->withInput()->withErrors($validator);
        }

        $author->name = $request->name;
        $author->bio = $request->bio;
        $author->status = $request->has('status') ? 'active' : 'inActive';

        $author->save();

        return redirect()->route('author.index')->with('success', 'Author updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('author.index')->with('success', 'Author Deleted Successfully');

    }
}

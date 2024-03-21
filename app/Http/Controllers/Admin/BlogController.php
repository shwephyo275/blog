<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blog::orderBy('id', 'desc')->with('category')->paginate(10);
        return view('admin.blog.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.blog.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'title'=>'required',
            'category.*'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,webp|max:1024'
        ]);

        $file = $request->file('image');
        $file_name = uniqid() . $file->getClientOriginalName();
        $file->move(public_path('/images') , $file_name);

        //store blog
        $created_blog = Blog::create([
            'slug'=>Str::slug($request->title),
            'title'=>$request->title,
            'image'=>$file_name,
            'description'=>$request->description,
        ]);

        //category sync
        $findBlog = Blog::find($created_blog->id);
        $findBlog->category()->sync($request->category);
        return redirect()->back()->with('success', 'Blog Created');

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
    public function edit(string $id)
    {
        // return $id;
        $data = Blog::with('category')->where('id', $id)->first();
        $category = Category::all();
        return view('admin.blog.edit', compact('category', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Blog::where('id', $id)->first();
        //check image
        if($file = $request->file('image')) {
            $file_name = uniqid() . $file->getClientOriginalName();
            $file->move(public_path('/images'), $file_name);
        } else {
            $file_name = $data->image;
        }
        //update data
        $data->update([
            'title' => $request->title,
            'image' => $file_name,
            'description' => $request->description,
        ]);
        //sync category
        $findBlog = Blog::find($id);
        $findBlog->category()->sync($request->category);
        return redirect()->back()->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

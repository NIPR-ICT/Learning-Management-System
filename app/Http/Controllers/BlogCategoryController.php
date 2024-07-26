<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BlogCategory::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.manage-category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
     $request->validate([
        'title' => 'required|string|unique:blog_categories,title|min:4',
        'text_color' => 'required',
        'bg_color' => 'required',
    ]);

    $lesson = new BlogCategory([
        'title' => $request->input('title'),
        'text_color' => $request->input('text_color'),
        'bg_color' => $request->input('bg_color'),
    ]);

    $lesson->save();

    return redirect()->route('all.category')->with('alert', [
        'title' => 'Success!',
        'text' => 'Category added successfully.',
        'icon' => 'success'
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = BlogCategory::findOrFail($id); // Fetch program by ID
        return view('admin.update-category', compact('category')); // Pass program data to view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string',
            'text_color' => 'required',
            'bg_color' => 'required',
        ]);
        
        $blogCategory = BlogCategory::findOrFail($request->id);

        // Update the program with the new data
        $blogCategory->title = $request->input('title');
        $blogCategory->text_color = $request->input('text_color');
        $blogCategory->bg_color = $request->input('bg_color');

        $blogCategory->save();

        return redirect()->route('all.category')->with('alert', [
            'title' => 'Success!',
            'text' => 'Category updated successfully.',
            'icon' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $part = BlogCategory::findOrFail($id);
         $part->delete();
 
         return redirect()->route('all.category')->with('alert', [
             'title' => 'Deleted!',
             'text' => 'Category deleted successfully!',
             'icon' => 'success'
         ]);
    }
}

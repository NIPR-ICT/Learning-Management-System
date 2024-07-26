<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Blog::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.manage-all-post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::orderBy('title', 'desc')->get();
        return view('admin.add-post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:blogs,title',
            'body' => 'required|string',
            'published_at' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'featured' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $timestamp = now()->timestamp;
            $title = $request->input('title');
            $fileName = Str::slug($title) . '-' . $timestamp . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('post_images', $fileName, 'public');
        }
        // dd('got here');
        $program = new Blog([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'user_id' => auth()->id(),
            'published_at' => $request->get('published_at'),
            'category_id' => $request->get('category_id'),
            'featured' => $request->get('featured'),
            'image' => $filePath ?? null,
        ]);

        $program->save();
        return redirect()->route('all.post')->with('alert', [
            'title' => 'Success!',
            'text' => 'Post created successfully.',
            'icon' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Blog::findOrFail($id);
        $categories = BlogCategory::all();

        return view('admin.update-post', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:blog_categories,id',
            'body' => 'required|string',
            'published_at' => 'required|date',
            'featured' => 'nullable|boolean',
        ]);

            $blog = Blog::findOrFail($request->id);
                // Update the program with the new data
                $blog->title = $request->input('title');
                $blog->category_id = $request->input('category_id');
                $blog->body = $request->input('body');
                $blog->published_at = $request->input('published_at');
                $blog->featured = $request->boolean('featured', false);

                $blog->save();

                return redirect()->route('all.post')->with('alert', [
                    'title' => 'Success!',
                    'text' => 'Post updated successfully.',
                    'icon' => 'success'
                ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Blog::findOrFail($id);
        Log::info('File path: ' . $post->image);

        if (!empty($post->image) && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }
        if($post->delete()){
         return redirect()->route('all.post')->with('alert', [
             'title' => 'Deleted!',
             'text' => 'Post deleted successfully!',
             'icon' => 'success'
         ]);
        }
    }

    /////////////////////////////////////////// public view///////////////////////////////////////

    public function BlogHome(){
        $blogs = Blog::with('category')->latest()->paginate(5);
        $cats = BlogCategory::latest()->take(6)->get();
        return view('blog', compact('blogs','cats'));
    }

    public function BlogDetail(string $id){
        $blog = Blog::with('category')->where('slug',$id)->first();
        $cats = BlogCategory::latest()->take(6)->get();
        return view('blog-detail', compact('blog', 'cats'));
    }
    public function BlogCategory(string $id){
        $blogs = Blog::with('category')->where('category_id', $id)->latest()->paginate(10);
        $cats = BlogCategory::latest()->take(6)->get();        
        return view('blog', compact('blogs','cats'));
    }

}

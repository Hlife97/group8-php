<?php

// app/Http/Controllers/Admin/BlogController.php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->get();
//        return response()->json($blogs);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|array',
            'title.en' => 'required|string',
            'title.az' => 'required|string',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.az' => 'required|string',
            'slug' => 'nullable|unique:blogs,slug',
            'image' => 'nullable|image',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = Storage::putFile('uploads/blogs', $request->file('image'));
        }
        $validated['slug'] = Str::slug($validated['title']['az']);

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog başarıyla kaydedildi.');
    }

    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|array',
            'title.en' => 'required|string',
            'title.az' => 'required|string',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.az' => 'required|string',
            'slug' => 'required|unique:blogs,slug,' . $blog->id,
            'image' => 'nullable|image',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog başarıyla güncellendi.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog başarıyla silindi.');
    }
}


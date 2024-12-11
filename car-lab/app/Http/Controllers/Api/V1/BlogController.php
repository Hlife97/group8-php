<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $blogs = Blog::all();
            return response()->json(['code' => 200,'data' => $blogs,'message' => __('Əməliyyat uğurla başa çatdı.')]);
        }catch (\Exception $exception){
            return response()->json([
                'code' => 500,
                'data' => $exception->getMessage(),
                'message' => __('Xeta bas verdi!')
            ], 500);
        }

    }

    /**
     * Display a listing of the resource.
     */
    public function getBlogsStatusTrue()
    {
        try {
            $blogs = Blog::whereStatus(1)->get();
            return response()->json(['code' => 200,'data' => $blogs,'message' => __('Əməliyyat uğurla başa çatdı.')]);
        }catch (\Exception $exception){
            return response()->json([
                'code' => 500,
                'data' => $exception->getMessage(),
                'message' => __('Xeta bas verdi!')
            ], 500);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

        try {
            if ($request->hasFile('image')) {
                $validated['image'] = Storage::putFile('uploads/blogs', $request->file('image'));
            }
            $validated['slug'] = Str::slug($validated['title']['az']);

            $created = Blog::create($validated);

            if($created){
                return response()->json([
                    'code' => 201,
                    'data' => $created,
                    'message' => __('Blog ugurla yaradildi')
                ], 201);
            }

            return response()->json([
                'code' => 400,
                'data' => null,
                'message' =>  __('Xeta bas verdi!')
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'code' => 500,
                'data' => $exception->getMessage(),
                'message' => __('Xeta bas verdi!')
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::find($id);

        if($blog){
            return response()->json([
                'code' => 200,
                'data' => $blog,
                'message' => 'Ugurla alindi'
            ]);
        }
        return response()->json([
            'code' => 404,
            'data' => null,
            'message' => "Bu $id ye gore blog tapilmadi!"
        ], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        if($blog){
            $blog->delete();
            return response()->json([
                'code' => 200,
                'data' => null,
                'message' => "$id li blog ugurla silindi!"
            ]);
        }
        return response()->json([
            'code' => 404,
            'data' => null,
            'message' => "$id ye gore blog tapilmadi!"
        ], 404);
    }
}

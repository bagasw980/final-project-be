<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\API\BaseController;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit', 10);
        $sort = $request->get('sort', 'desc');
        $dir = $request->get('dir', 'created_at');

        $blogs = Blog::orderBy($dir, $sort)->paginate($limit);

        return $this->responseSuccess($blogs, 'Blogs retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog = Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'author' => auth('api')->user()->name,
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $upload = Storage::putFileAs('public/blogs', $image, $image_name);
            $url = url(Storage::url($upload));
            $blog->image = $url;
            $blog->save();
        }

        return $this->responseSuccess($blog, 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::find($id);

        if(!$blog) {
            return $this->responseError('Blog not found.', null, 404);
        }

        return $this->responseSuccess($blog, 'Blog retrieved successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);

        if(!$blog) {
            return $this->responseError('Blog not found.', null, 404);
        }

        $blog->delete();

        return $this->responseSuccess(null, 'Blog deleted successfully.');
    }
}

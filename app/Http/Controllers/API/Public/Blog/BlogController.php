<?php

namespace App\Http\Controllers\API\Public\Blog;

use App\Http\Controllers\API\BaseController;
use App\Models\Blog;
use Illuminate\Http\Request;

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
}

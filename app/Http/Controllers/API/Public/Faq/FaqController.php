<?php

namespace App\Http\Controllers\API\Public\Faq;

use App\Http\Controllers\API\BaseController;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit', 10);
        $sort = $request->get('sort', 'desc');
        $dir = $request->get('dir', 'created_at');

        $faqs = Faq::orderBy($dir, $sort)->paginate($limit);

        return $this->responseSuccess($faqs, 'Faqs retrieved successfully.');
    }
}

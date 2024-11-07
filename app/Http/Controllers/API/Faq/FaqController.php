<?php

namespace App\Http\Controllers\API\Faq;

use App\Http\Controllers\API\BaseController;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends  BaseController
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return $this->responseSuccess($faq, 'Faq created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faq = Faq::find($id);

        if(!$faq) {
            return $this->responseError('Faq not found.', null, 404);
        }

        return $this->responseSuccess($faq, 'Faq retrieved successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::find($id);

        if(!$faq) {
            return $this->responseError('Faq not found.', null, 404);
        }

        $faq->delete();

        return $this->responseSuccess(null, 'Faq deleted successfully.');
    }
}

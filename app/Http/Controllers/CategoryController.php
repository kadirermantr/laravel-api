<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = Category::all();

        if ($categories->count() == 0) {
            return response()->json([
                'message' => 'Not found!'
            ]);
        }

        return response()->json($categories);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $authors = Author::all();

        if ($authors->count() == 0) {
            return response()->json([
                'message' => 'Not found!'
            ]);
        }

        return response()->json($authors);
    }
}

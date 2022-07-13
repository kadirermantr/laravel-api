<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $books = Book::all();

        if ($books->count() == 0) {
            return response()->json([
                'message' => 'Not found!'
            ]);
        }

        return response()->json($books);
    }
}

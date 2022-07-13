<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = User::all();

        if ($users->count() == 0) {
            return response()->json([
               'message' => 'Not found!'
            ]);
        }

        return response()->json($users);
    }
}

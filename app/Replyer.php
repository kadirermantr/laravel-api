<?php

namespace App;

use Illuminate\Http\JsonResponse;

class Replyer
{
    public static function responseSuccess($data): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    public static function responseFalse(): JsonResponse
    {
        return response()->json([
            'success' => false,
            'data' => null,
        ]);
    }
}

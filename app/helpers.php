<?php

namespace App;

use Illuminate\Http\JsonResponse;

if (! function_exists('returnSuccess')) {
    function returnSuccess($data): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }
}

if (! function_exists('returnFalse')) {
    function returnFalse(?int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'data' => null,
        ], $statusCode);
    }
}

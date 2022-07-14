<?php

namespace App;

use Illuminate\Http\JsonResponse;

if (! function_exists('responseSuccess')) {
    function responseSuccess($data): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }
}

if (! function_exists('responseFalse')) {
    function responseFalse(?int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'data' => null,
        ], $statusCode);
    }
}

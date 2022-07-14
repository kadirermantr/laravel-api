<?php

namespace App;

use Illuminate\Http\JsonResponse;

class Replier
{
    public static function response(bool $success, int $code, $data = null): JsonResponse
    {
        $body = [
            'success' => $success,
            'data' => $data,
        ];

        return response()->json($body, $code);
    }

    public static function responseSuccess($data): JsonResponse
    {
        return self::response(
            true,
            200,
            $data,
        );
    }

    public static function responseFalse($data = null, int $code = 400): JsonResponse
    {
        return self::response(
            false,
            $code,
            $data,
        );
    }
}

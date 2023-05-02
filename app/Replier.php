<?php

namespace App;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class Replier
{
    public static function response(bool $success, int $code, $data = null, $message = null): JsonResponse
    {
        $body = [
            'success' => $success,
            'data' => $data,
        ];

        if (isset($message)) {
            $body['message'] = $message;
        }

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

    public static function responseFalse($data = null, $message = null, int $code = 400): JsonResponse
    {
        return self::response(
            false,
            $code,
            $data,
            $message,
        );
    }

    public static function responseError($validator): JsonResponse
    {
        $response = self::responseFalse($validator->errors()->first(), 422);

        throw new ValidationException($validator, $response);
    }
}

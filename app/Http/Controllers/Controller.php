<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnSuccess($data): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    public function returnFalse(?int $statusCode = 404): JsonResponse
    {
        return response()->json([
            'success' => false,
            'data' => null
        ], $statusCode);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $name = str_replace('Controller', '', class_basename($this));

        $model = sprintf('\App\Models\%s', $name);

        $data =  (new $model)->all();

        if ($data->count() == 0)
            return $this->returnFalse();

        return $this->returnSuccess($data);
    }
}

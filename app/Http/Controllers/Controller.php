<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

use function App\returnFalse;
use function App\returnSuccess;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public string $name;
    public string $model;

    public function __construct()
    {
        $this->name = str_replace('Controller', '', class_basename($this));
        $this->model = sprintf('\App\Models\%s', $this->name);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = (new $this->model)->all();

        if ($data->count() == 0)
            return returnFalse();

        return returnSuccess($data);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $data = (new $this->model)->find($id);

        if (empty($data))
            return returnFalse();

        return returnSuccess($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Replier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Controller extends BaseController
{
    public string $name;

    public string $model;

    public string $request;

    public function __construct()
    {
        $this->name = str_replace('Controller', '', class_basename($this));
        $this->model = '\App\Models\\'.$this->name;
        $this->request = '\App\Http\Requests\\'.$this->name.'Request';
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = (new $this->model)->all();

        if ($data->count() == 0) {
            return Replier::responseFalse();
        }

        return Replier::responseSuccess($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $data = (new $this->model)->find($id);

        if (empty($data)) {
            return Replier::responseFalse();
        }

        return Replier::responseSuccess($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), (new $this->request)->rules());

        if ($validator->fails()) {
            Replier::responseError($validator);
        }

        $data = (new $this->model)->create($validator->validated());

        return Replier::responseSuccess($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $model = (new $this->model);

        $data = $model->find($id);

        if (empty($data)) {
            return Replier::responseFalse();
        }

        $model->destroy($id);

        return Replier::responseSuccess($data);
    }
}

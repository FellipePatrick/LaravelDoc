<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function  response(string $message, string|int $status, array|Model|JsonResource $data = []){
        return response()->json([
            'message' => $message,
            'status' => $status,
            'data' => $data
        ], $status);
    }
    public function error(string $message, string|int $status,array|MessageBag $errors = [],array $data = []){
        return response()->json([
            'message' => $message,
            'status' => $status,
            'data' => $data,
            'errors' => $errors
        ], $status);
    }
}

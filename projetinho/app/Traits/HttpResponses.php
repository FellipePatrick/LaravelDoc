<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

class HttpResponses extends Controller
{
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

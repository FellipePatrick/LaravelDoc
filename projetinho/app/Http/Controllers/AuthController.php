<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            return view('welcome', ['user' => auth()->user()]);
        }
        return $this->response('Not Authorized', 403);

    }
    public function logout(Request $request){
        $deleted = $request->user()->currentAccessToken()->delete();
        if($deleted){
            return $this->response('Token deleted', 200);
        }
        return $this->response('Token not deleted', 403);
    }
}

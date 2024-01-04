<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\HttpResponses;

//3|OB3X2wkTGswPbP7x88jrvFPWlwdHD8L3GtVkZBjq859013ef

class AuthController extends Controller
{
    use HttpResponses;
    public function login(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            return $this->response('Authorized', 200, [
                'token' => $request->user()->createToken('UserToken')->plainTextToken
            ]);
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

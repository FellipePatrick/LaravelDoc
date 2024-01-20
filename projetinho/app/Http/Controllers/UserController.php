<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $userList = \App\Models\User::all();
        return response()->json(['users' => $userList]);
    }

    public function teste(Request $request){
        $request->validate([
            'name' => 'required|string']);

        return response()->json([$request->name]);
    }


    public function show($id)
    {
        $user = \App\Models\User::find($id);
        if(!$user){
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(['user' => $user]);
    }
    public function store(UserRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user){
            $created = User::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password
                ]
            );
            if($created){
                return $this->response('User created', 200, $created);
            }
            return $this->error('Invoice not created', 400);
        };
        return $this->error('User already exists', 422);
    }

    public function destroy($id)
    {
        $user = \App\Models\User::find($id);
        if(!$user){
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'User deleted'], 200);
    }
}

<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\HttpResponses;
use App\Http\Resources\V1\UserResource;
use Illuminate\Validation\Validator;

class UserController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return $this->error('Validator invalid', 422, $validator->errors());
        }
        $created = User::create($validator->validated());
        if($created){
            return $this->response('User created', 200, $created);
        }
        return $this->error('Invoice not created', 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::where('id',$id)->first();
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return $this->error('Data Invalid', 422, $validator->errors());
        }
        $validated = $validator->validated();
        $updated = $user->update([
            'name' =>  $validated['name'],
            'email' =>  $validated['email'],
            'password' =>  $validated['password']
        ]);
        if($updated){
            return $this->response('user updated', 200);
        }
        return $this->error('user not updated', 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $deleted = $user->delete();
        if($deleted){
            return $this->response('User deleted', 200);
        }
        return $this->error('User not deleted', 400);
    }
}

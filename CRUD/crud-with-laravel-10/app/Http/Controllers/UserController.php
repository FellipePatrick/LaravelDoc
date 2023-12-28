<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;

class UserController extends Controller
{
    public readonly User $user;

    public function __construct(){
        $this->user = new User();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->user->all();
        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->user->create([
            'nome' => $request->input('nome'),
        ]);
        if($created){
            return redirect()->back()->with('message', 'Usuario cadastrado!');
           }
           return redirect()->back()->with('message', 'Erro ao cadastrar o usuario!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        dd($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user_edit', ['user'=> $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $up = $this->user->where('id', $id)->update($request->except(['_token', '_method']));
       
       if($up){
        return redirect()->back()->with('message', 'Usuario atualizado!');
       }
       return redirect()->back()->with('message', 'Erro ao atualizar o usuario!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->user->where('id', $id)->delete();
        return redirect()->route('users.index')->with('message', 'Usuario Deletado!');
    }
}

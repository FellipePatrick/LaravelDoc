@extends('master')

@section('content')
    <h2 class="my-3">Lista de Usuarios Cadastrados <a href="{{route('users.create')}}" class="btn btn-primary">Cadastrar</a></h2> 
    @if(session()->has('message'))
        {{session()->get('message')}}
    @endif
    <ul>
        @foreach($users as $user)
        <form action="{{route('users.destroy', ['user'=>$user->id])}}" method="post">    
            <li class="my-5 " >{{$user->nome}} | <a href="{{route('users.edit', ['user'=> $user->id])}}" class="btn btn-success">Editar</a> | <a href="{{route('users.show', ['user'=> $user->id])}}" class="btn btn-info">Info</a>
            |
             @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Delete</button>
            </li>
        </form>
        @endforeach  
    </ul>
@endsection
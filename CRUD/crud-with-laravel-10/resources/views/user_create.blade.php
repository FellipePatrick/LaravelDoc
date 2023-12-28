@extends('master')

@section('content')
    <h4 class="my-4 ">Cadastro de Usuario</h4>
    @if(session()->has('message'))
        {{session()->get('message')}}
    @endif
    <div class="container d-flex justify-content-center">
        <form class="w-50 border border-1 p-5" action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Fernando Pedrosa" >
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a class="text-decoration-none mx-2" href="{{route('users.index')}}">voltar</a>
        </form>
    </div>    
@endsection
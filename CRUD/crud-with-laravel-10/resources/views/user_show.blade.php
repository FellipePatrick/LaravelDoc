@extends('master')

@section('content')
    <h4 class="my-4 ">Informações do Usuario: {{$user->nome}}</h4>
    @if(session()->has('message'))
        {{session()->get('message')}}
    @endif
    <div class="container d-flex justify-content-center">
        <form class="w-50 border border-1 p-5" action="{{ route('users.update', ['user'=>$user->id]) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{$user->nome}}" >
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a class="text-decoration-none mx-2" href="{{route('users.index')}}">voltar</a>
        </form>
    </div>    
@endsection
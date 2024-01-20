@extends('layouts.base')

@section('content')
    @foreach ( $tasks as $task)
        <div class="card col-md-4">
            <div class="card-header">
                <h4>Nome: {{$task->name}}</h4>
            </div>
            <div class="card-body my-3">
                <p>Descrição: {{$task->description}}</p>
                <p class="my-3">Status:
                    @if($task->status == 1)
                        Pendente
                    @elseif($task->status == 2)
                        Em andamento
                    @else
                        Concluído
                    @endif
                </p>
                <p>Criado Por: {{$task->idOner}}</p>
                <a href="/" type="button" class="btn btn-primary my-3" style="background-color:blue; ">Aceitar</a>
                <a href="/" type="button" class="btn btn-danger my-3 mx-2" style="background-color:red; ">Recusar</a>

        </div>
    @endforeach

@endsection

@extends('layouts.base')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form action="{{route('login.web')}}" method="post">
                    @csrf
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email"  id="email" placeholder="Digite seu email" required>
                  </div>
                  <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control"  name="password" id="senha" placeholder="Digite sua senha" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

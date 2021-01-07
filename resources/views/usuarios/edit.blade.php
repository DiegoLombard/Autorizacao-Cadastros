@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Usuário') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="{{route('usuarios.update', $usuario->id)}}" method="POST" class="form-horizontal">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="form-group">
                              <label for="name">Nome</label>
                              <input type="text" class="form-control" name="name"  value="{{$usuario->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" class="form-control" name="email"  value="{{$usuario->email}}">
                            </div>
                            <label for="cargo">Cargo</label>
                            <select name="cargo" class="form-control">
                                <option {{$usuario->cargo == 'Gerente' ? 'selected': ''}}>Gerente</option>
                                <option {{$usuario->cargo == 'Atendente' ? 'selected': ''}}>Atendente</option>
                            </select>
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" name="password" placeholder="Digite nova senha ou deixe espaço em branco">
                            <br>
                            <a href="{{route('usuarios.listar')}}"><button type="submit" class="btn btn-success">Atualizar</button></a>


                        </form>
                        
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

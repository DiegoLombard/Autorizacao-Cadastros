@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Usuários') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <table class="table">
                       <thead>
                           <tr>
                               <th>Nome</th>
                               <th>Email</th>
                               <th>Cargo</th>
                               <th>Ação</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($usuarios as $usuario)
                               
                           
                           <tr>
                               <td scope="row">{{$usuario->name }}</td>
                               <td>{{$usuario->email }}</td>
                               <td>{{$usuario->cargo }}</td>
                               <td>
                                       
                                   @can('update', App\Models\User::class)
                                   <a href="{{route('usuarios.edit', $usuario->id)}}"><button class="btn btn-info btn-sm">Editar</button></a>
                                   @endcan
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

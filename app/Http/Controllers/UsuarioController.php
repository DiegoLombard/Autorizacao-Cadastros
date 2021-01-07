<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function listar()
    {
        $usuarios = User::all();
        return view('usuarios.listar', compact('usuarios'));

    }
    public function edit($id)
    {
        $this->authorize('update',Usuario::class);
        $usuario = User::find($id);
        return view('usuarios.edit', compact('usuario'));
    }
    public function update(Request $request, $id)
    {
        $this->authorize('update',Usuario::class);
        $usuario = User::find($id);
        $dados = $request->all();
        if(!$dados['password']){
            $senhaAntiga = $usuario->password;
            $dados['password'] = $senhaAntiga;
            $usuario->update($dados);
        }else{
            $senhaNova = Hash::make($dados['password']);
            $dados['password'] = $senhaNova;
            $usuario->update($dados);
        }
        return redirect()->route('usuarios.listar');
    }
}

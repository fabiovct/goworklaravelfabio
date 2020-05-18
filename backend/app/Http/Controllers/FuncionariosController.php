<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionarios_clientes;
use Illuminate\Database\Eloquent\Model;

class FuncionariosController extends Controller
{

    public function index() {

    }

    public function list(){
        try{
        $usuarios = Funcionarios_clientes::get();
        return response()->json($usuarios);
    } catch (QueryException $e) {
        return response()->json([
            "error" => $e
        ]);
    }
    }

    public function create( Request $request) {

    try{
        $usuario = new Funcionarios_clientes();
            $usuario->nome_usuario = $request->name;
            $usuario->cpf_usuario = $request->cpf;
            $usuario->id_cliente = $request->id_cliente;
        $usuario->save();

        return response()->json($usuario);

    } catch (QueryException $e) {
        return response()->json([
            "error" => $e
        ]);
    }
}

public function delete($Id){
    try {

        Funcionarios_clientes::destroy($Id);
        return response('elemento deletado com sucesso');
    } catch (QueryException $e) {

        return response()->json([
            "error" => $e,
        ]);
    }
}

public function update(Request $request, $id) {
    try {

        $usuario = Funcionarios_clientes::find($id);
            $usuario->nome_usuario = $request->name;
            $usuario->cpf_usuario = $request->cpf;
            $usuario->id_cliente = $request->id_cliente;
        $usuario->save();
        return response()->json($usuario);

    } catch (QueryException $e) {
        return response()->json([
            "error" => $e,
        ]);
    }
}

public function selectById(Request $request){
    try {
    $usuario = Funcionarios_clientes::where('id', '=', $request['id']);
    return $usuario->get();
} catch (QueryException $e) {
    return response()->json([
        "error" => $e,
    ]);
    }
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use Illuminate\Database\Eloquent\Model;

class ClientesController extends Controller
{

    public function index() {

    }

    public function list(){
        try{
        $planos = Clientes::get();
        return response()->json($planos);
    } catch (QueryException $e) {
        return response()->json([
            "error" => $e
        ]);
    }
    }

    public function create( Request $request) {

    try{
        $cliente = new Clientes();
            $cliente->nome_cliente = $request->name;
            $cliente->cpf_cnpj = $request->cpf_cnpj;
            $cliente->id_escritorio = $request->id_escritorio;
            $cliente->is_plano = $request->id_plano;
        $cliente->save();

        return response()->json($cliente);

    } catch (QueryException $e) {
        return response()->json([
            "error" => $e
        ]);
    }
}

public function delete($Id){
    try {

        Clientes::destroy($Id);
        return response('elemento deletado com sucesso');
    } catch (QueryException $e) {

        return response()->json([
            "error" => $e,
        ]);
    }
}

public function update(Request $request, $id) {
    try {

        $cliente = Clientes::find($id);
            $cliente->nome_cliente = $request->name;
            $cliente->cpf_cnpj = $request->cpf_cnpj;
            $cliente->id_escritorio = $request->id_escritorio;
            $cliente->is_plano = $request->id_plano;
        $cliente->save();
        return response()->json($cliente);

    } catch (QueryException $e) {
        return response()->json([
            "error" => $e,
        ]);
    }
}

public function selectById(Request $request){
    try {
    $cliente = Clientes::where('id', '=', $request['id']);
    return $cliente->get();
} catch (QueryException $e) {
    return response()->json([
        "error" => $e,
    ]);
    }
}

}

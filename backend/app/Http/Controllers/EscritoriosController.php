<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escritorios;
use Illuminate\Database\Eloquent\Model;

class EscritoriosController extends Controller
{
    public function index() {

    }

    public function list(){
        $escritorios = Escritorios::get();
        return response()->json($escritorios);
    }

    public function create( Request $request) {

    try{
        $escritorio = new Escritorios();
            $escritorio->nome_escritorio = $request->name;
            $escritorio->endereco_escritorio = $request->address;
        $escritorio->save();

        return response()->json($escritorio);

    } catch (QueryException $e) {
        return response()->json([
            "error" => $e
        ]);
    }
}

public function delete($Id){
    try {

        Escritorios::destroy($Id);
        return response('elemento deletado com sucesso');
    } catch (QueryException $e) {

        return response()->json([
            "error" => $e,
        ]);
    }
}

public function update(Request $request, $id) {
    try {

        $escritorio = Escritorios::find($id);
        $escritorio->nome_escritorio = $request->name;
        $escritorio->endereco_escritorio = $request->address;
        $escritorio->save();
        return response()->json($escritorio);

    } catch (QueryException $e) {
        return response()->json([
            "error" => $e,
        ]);
    }
}

public function selectById(Request $request){
    try {
    $escritorio = Escritorios::where('id', '=', $request['id']);
    return $escritorio->get();
} catch (QueryException $e) {
    return response()->json([
        "error" => $e,
    ]);
    }
}

}

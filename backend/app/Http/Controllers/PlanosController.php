<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planos_coworking;
use Illuminate\Database\Eloquent\Model;

class PlanosController extends Controller
{

    public function index() {

    }

    public function list(){
        try{
        $planos = Planos_coworking::get();
        return response()->json($planos);
    } catch (QueryException $e) {
        return response()->json([
            "error" => $e
        ]);
    }
    }

    public function create( Request $request) {

    try{
        $plano = new Planos_coworking();
            $plano->nome_plano = $request->name;
            $plano->valor_mensal = $request->price;
        $plano->save();

        return response()->json($plano);

    } catch (QueryException $e) {
        return response()->json([
            "error" => $e
        ]);
    }
}

public function delete($Id){
    try {

        Planos_coworking::destroy($Id);
        return response('elemento deletado com sucesso');
    } catch (QueryException $e) {

        return response()->json([
            "error" => $e,
        ]);
    }
}

public function update(Request $request, $id) {
    try {

        $plano = Planos_coworking::find($id);
        $plano->nome_plano = $request->name;
        $plano->valor_mensal = $request->price;
        $plano->save();
        return response()->json($plano);

    } catch (QueryException $e) {
        return response()->json([
            "error" => $e,
        ]);
    }
}

public function selectById(Request $request){
    try {
    $plano = Planos_coworking::where('id', '=', $request['id']);
    return $plano->get();
} catch (QueryException $e) {
    return response()->json([
        "error" => $e,
    ]);
    }
}

}
